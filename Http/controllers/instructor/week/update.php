<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;
use Core\WeekValidator;
use Core\Authorization;


$week = ValidationProcessor::prepare($_POST, $weekRules = [
    'course_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'courses'),
        'errorKey'  => 'course_id',
        'message'   => 'المادة المختارة غير موجودة'
    ],
    'start_date' => [
        'validator' => static fn($v): bool => Validator::date($v),
        'errorKey'  => 'start_date',
        'message'   => 'تاريخ البداية غير صالح لاستخدامه'
    ],
    'end_date' => [
        'validator' => static fn($v): bool => Validator::date($v),
        'errorKey'  => 'end_date',
        'message'   => 'تاريخ النهاية غير صالح لاستخدامه'
    ]
]);
        

$Validator = WeekValidator::make(
    $week->data['start_date'], 
    $week->data['end_date'], 
    $week->data['course_id'],
    $week->data['week_id']
);

$week->mergeErrors($Validator->errors());

$week->throwErrors();

authorize(Authorization::checkCourseInstructor($week->data['course_id'])); 
   

App::resolve(Database::class)->query(
    'UPDATE weeks
     SET course_id = :course_id, start_date = :start_date, end_date = :end_date
     WHERE id = :id', [    
    'id'           => $week->data['week_id'],
    'course_id'    => $week->data['course_id'],
    'start_date'   => $week->data['start_date'],
    'end_date'     => $week->data['end_date']
]);

 redirect('/instructor/course?id='.$week->data['course_id']);




