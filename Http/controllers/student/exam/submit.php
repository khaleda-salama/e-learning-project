<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\Authorization;
use Core\Session;


$student = App::resolve(Database::class)->query(
    'SELECT id
     FROM students
     WHERE user_id = :user_id',
    [
        'user_id' => Session::get('user')['id']
    ]
)->findOrFail();

$studentId = $student['id'];


$examSubmit = ValidationProcessor::prepare($_POST + $_FILES, $examSubmitRules = [
    'exam_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'exams'),
        'errorKey'  => 'exam_id',
        'message'   => 'الاختبار المختار غير موجود'
    ],
    'answer_file' => [
        'validator' => static fn($v): bool => Validator::file($v),
        'errorKey'  => 'answer_file',
        'message'   => 'امتداد الرابط يجب ان يكون pdf, ppt, pptx او حجمه اكبر من 5MG'
    ],
]);


$examSubmit->throwErrors();


$existsingSubmission = App::resolve(Database::class)->query(
    'SELECT id 
     FROM exam_submissions
     WHERE exam_id = :exam_id AND student_id = :student_id', [
    'exam_id'    => $examSubmit->data['exam_id'],
    'student_id' => $studentId
])->find();


// authorize(Authorization::checkWeek($examSubmit->data['week_id']));

  
$examSubmitData  = $examSubmit->data['answer_file'];

$uploadDir = base_path('public/uploads/');

$fileName  = time() . '_' . $examSubmitData['name'];

$destination = $uploadDir . $fileName;

move_uploaded_file($examSubmitData['tmp_name'], $destination);

$filePath = '/uploads/' . $fileName;


App::resolve(Database::class)->query('INSERT INTO exam_submissions (answer_file, exam_id, student_id, submitted_at, original_file_name) VALUES (:answer_file, :exam_id, :student_id, :submitted_at, :original_file_name)', [    
    'answer_file'  => $filePath,
    'exam_id'      => $examSubmit->data['exam_id'],
    'student_id'   => $studentId,
    'submitted_at' => date('Y-m-d H:i:s'),
    'original_file_name' => $examSubmit->data['answer_file']['name']
]);


redirect('/student/exam?id=' . $examSubmit->data['exam_id']);


