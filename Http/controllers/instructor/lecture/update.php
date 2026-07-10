<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\Authorization;


$lecture = ValidationProcessor::prepare($_POST + $_FILES, $lectureRules = [
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
        'validator' => static fn($v): bool => Validator::url($v),
        'errorKey'  => 'url',
        'message'   => 'هذا الرابط غير صالح'
    ],
]);


$lecture->throwErrors();

Authorization::checkLectureInstructor($lecture->data['id']);
Authorization::checkWeek($lecture->data['week_id']);

  
App::resolve(Database::class)->query(
    'UPDATE lectures
     SET title = :title, url = :url, week_id = :week_id
     WHERE id = :id',
  [   
    'id'         => $lecture->data['id'],
    'title'      => htmlspecialchars($lecture->data['title']),
    'url'        => $lecture->data['url'],
    'week_id'    => $lecture->data['week_id'],
  ]
);


$courseId = App::resolve(Database::class)->query(
    'SELECT course_id FROM weeks WHERE id = :week_id', 
     ['week_id' => $lecture->data['week_id']]

)->find();

 redirect('/instructor/course?id='.$courseId['course_id']);




