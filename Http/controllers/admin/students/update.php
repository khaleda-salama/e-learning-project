<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;


$student = ValidationProcessor::prepare($_POST, $studentRules = [
    'user_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'users'),
        'errorKey'  => 'user_id',
        'message'   => 'الطالب المختار غير موجود'
    ],

    'major_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'majors'),
        'errorKey'  => 'major_id',
        'message'   => 'التخصص المختار غير موجود'
    ],

    'academic_year' => [
        'validator' => static fn($v): bool => Validator::hourYear($v),
        'errorKey'  => 'academic_year',
        'message'   => 'يرجى اختيار مستوى دراسي صحيح'
    ],
]);

$student->throwErrors();

App::resolve(Database::class)->query(
    'UPDATE students
     SET user_id = :user_id, academic_year = :academic_year, major_id = :major_id 
     WHERE id = :id', [   
    'id'             => $student->data['id'],     
    'user_id'        => $student->data['user_id'],
    'academic_year'  => $student->data['academic_year'],
    'major_id'       => $student->data['major_id'],
]);

 redirect('/students');