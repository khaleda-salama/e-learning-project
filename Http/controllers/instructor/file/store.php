<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\Authorization;


$file = ValidationProcessor::prepare($_POST + $_FILES, $fileRules = [
    'week_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'weeks'),
        'errorKey'  => 'week_id',
        'message'   => 'الاسبوع المختار غير موجود'
    ],
    'title' => [
        'validator' => static fn($v): bool => Validator::valid($v, 1, 100),
        'errorKey'  => 'title',
        'message'   => 'عنوان الملف أكبر من 100 حرف أو أقل من حرف'
    ],
    'url' => [
        'validator' => static fn($v): bool => Validator::file($v),
        'errorKey'  => 'url',
        'message'   => 'امتداد الرابط يجب ان يكون pdf, ppt, pptx او حجمه اكبر من 5MG'
    ],
]);


$file->throwErrors();

authorize(Authorization::checkWeek($file->data['week_id']));

  
$fileData  = $file->data['url'];

$uploadDir = base_path('public/uploads/');

$fileName  = $fileData['name'];

$destination = $uploadDir . $fileName;

move_uploaded_file($fileData['tmp_name'], $destination);

$filePath = '/uploads/' . $fileName;


App::resolve(Database::class)->query('INSERT INTO files (title, url, week_id) VALUES (:title, :url, :week_id)', [    
    'title'      => htmlspecialchars($file->data['title']),
    'url'        => $filePath,
    'week_id'    => $file->data['week_id'],
]);


$courseId = App::resolve(Database::class)->query(
    'SELECT course_id FROM weeks WHERE id = :week_id', 
     ['week_id' => $file->data['week_id']]

)->find();

 redirect('/instructor/course?id='.$courseId['course_id']);




