

<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;


$instructor = ValidationProcessor::prepare($_POST, $instructorRules = [
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
]);

$instructor->throwErrors();

App::resolve(Database::class)->query('INSERT INTO instructors (user_id, major_id) VALUES (:user_id, :major_id)', [    
    'user_id'        => $instructor->data['user_id'],
    'major_id'       => $instructor->data['major_id']
]);

 redirect('/instructors');