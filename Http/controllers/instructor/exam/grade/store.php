<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\Authorization;
use Core\Session;


$submission = Authorization::checkSubmissionExam($_POST['submission_id'] ?? '');

$examSubmissions = ValidationProcessor::prepare($_POST, $examSubmissionsRules = [
    'submission_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'exam_submissions'),
        'errorKey'  => 'submission_id',
        'message'   => 'الملف الي تم تسليمه غير موجود'
    ],
    'grade' => [
        'validator' => static fn($v): bool => Validator::grade($v, $submission['total_grade']),
        'errorKey'  => 'grade',
        'message'   => 'درجة الطالب يجب ان تكون بين 0 والدرجة الكاملة الموضوعة سابقا'
    ],

]);


if($submission['grade']) {
    Session::flash('gradeExamRegistered', 'تم رصد الدرجة مسبقا');
    redirect('/exams/submissions?id='.$submission['exam_id']);
}

$examSubmissions->throwErrors();


// Store the Grade Exam For The Students
$gradeExamIsRegister = App::resolve(Database::class)->query(
    'UPDATE exam_submissions
     SET grade = :grade
     WHERE id = :submission_id', [    
    'submission_id'   => $examSubmissions->data['submission_id'],
    'grade'           => $examSubmissions->data['grade'],
]);

Session::flash('gradeExamIsRegister', 'تم رصد الدرجة بنجاح');
redirect('/exams/submissions?id='.$submission['exam_id']);
