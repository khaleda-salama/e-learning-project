<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\Authorization;
use Core\ExamTimeValidator;


$exam = ValidationProcessor::prepare($_POST + $_FILES, $examRules = [
    'week_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'weeks'),
        'errorKey'  => 'week_id',
        'message'   => 'الاسبوع المختار غير موجود'
    ],
    'title' => [
        'validator' => static fn($v): bool => Validator::valid($v, 7, 50),
        'errorKey'  => 'title',
        'message'   => 'عنوان الاختبار أكبر من 50 حرف أو أقل من حرف'
    ],
    'description' => [
        'validator' => static fn($v): bool => Validator::valid($v, 7, 255),
        'errorKey'  => 'description',
        'message'   => 'وصف الاختبار أكبر من 255 حرف أو أقل من حرف '
    ],
    'start_at' => [
        'validator' => static fn($v): bool => Validator::dateTime($v),
        'errorKey'  => 'start_at',
        'message'   => 'تاريخ البداية غير صالح لاستخدامه'
    ],
    'end_at' => [
        'validator' => static fn($v): bool => Validator::dateTime($v),
        'errorKey'  => 'end_at',
        'message'   => 'تاريخ نهاية غير صالح لاستخدامه'
    ],
    'url' => [
        'validator' => static fn($v): bool => Validator::file($v),
        'errorKey'  => 'url',
        'message'   => 'امتداد الملف يجب أن يكون pdf, ppt, pptx أو txt وحجمه أكبر من 5MG'
    ]
]);



$Validator = ExamTimeValidator::make(
    $exam->data['start_at'], 
    $exam->data['end_at'], 
    $exam->data['week_id']
);

$exam->mergeErrors($Validator->errors());

$exam->throwErrors();

authorize(Authorization::checkWeek($exam->data['week_id']));

$examData  = $exam->data['url'];

$uploadDir = base_path('public/uploads/');

$examName  = $examData['name'];

$destination = $uploadDir . $examName;

move_uploaded_file($examData['tmp_name'], $destination);

$examPath = '/uploads/' . $examName;


App::resolve(Database::class)->query(
    'UPDATE exams
     SET title = :title, description = :description, week_id = :week_id, start_at = :start_at, end_at = :end_at, url = :url
     WHERE id = :id', [    
    'id'          => $exam->data['id'],
    'title'       => htmlspecialchars($exam->data['title']),
    'description' => htmlspecialchars($exam->data['description']),
    'start_at'    => $exam->data['start_at'],
    'end_at'      => $exam->data['end_at'],
    'week_id'     => $exam->data['week_id'],
    'url'         => $examPath
]);



 redirect('/exam/show?id='.$exam->data['id']);




