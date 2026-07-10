<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;


$course = ValidationProcessor::prepare($_POST, $courseRules = [
    'name' => [
        'validator' => static fn($v): bool => Validator::valid($v, 10, 40),
        'errorKey'  => 'courseName',
        'message'   => 'اسم المساق يجب ان يكون على الأقل 10 حروف'
    ],

    'instructor_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'instructors'),
        'errorKey'  => 'instructor_id',
        'message'   => 'المدرس المختار غير موجود'
    ],

    'major_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'majors'),
        'errorKey'  => 'major_id',
        'message'   => 'التخصص المختار غير موجود'
    ],

    'hour_num' => [
        'validator' => static fn($v): bool => Validator::hourYear($v, 1, 4),
        'errorKey'  => 'hour_num',
        'message'   => 'عدد الساعات يجب أن تكون بين ساعة واربع ساعات'
     ],

    'level_year' => [
        'validator' => static fn($v): bool => Validator::hourYear($v),
        'errorKey'  => 'level_year',
        'message'   => 'يرجى اختيار مستوى دراسي صحيح'
    ],

    'semster_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'semster'),
        'errorKey'  => 'semster_id',
        'message'   => 'الفصل الدراسي المختار غير موجود'
    ],
]);


if (!Validator::checkCourseInstructor([
    'instructor_id' => $course->data['instructor_id'],
    'major_id'      => $course->data['major_id']
])) {
    $course->error(
        'courseInstructor', 'تخصص المدرس لا يطابق تخصص المساق'
    );
}

$course->throwErrors();


App::resolve(Database::class)->query(
    'UPDATE courses
     SET name = :name, instructor_id = :instructor_id, hour_num = :hour_num, level_year = :level_year, major_id = :major_id, semster_id = :semster_id 
     WHERE id = :id', [  
    
    'id'            => $course->data['id'],  
    'name'          => htmlspecialchars($course->data['name']),
    'instructor_id' => $course->data['instructor_id'],
    'hour_num'      => $course->data['hour_num'],
    'level_year'    => $course->data['level_year'],
    'major_id'      => $course->data['major_id'],
    'semster_id'    => $course->data['semster_id']
]);

 redirect('/courses');