<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;



$semster = ValidationProcessor::prepare($_POST, $semsterRules = [
    'name' => [
        'validator' => static fn($v): bool => Validator::valid($v, 10, 70),
        'errorKey'  => 'semsterName',
        'message'   => 'اسم الفصل الدراسي يجب أن يكون بين 10 و 70 حرفًا'
    ],

    'created_at' => [
        'validator' => static fn($v): bool => Validator::date($v),
        'errorKey'  => 'semsterDate',
        'message'   => 'تاريخ الفصل الدراسي ليس ضمن الفترة الزمنية المسموحة  (2028-2026)'
    ]
]);

$semster->throwErrors();


App::resolve(Database::class)->query('UPDATE semster SET name = :name,  created_at = :created_at WHERE id = :id', [    
    'id'          => $semster->data['id'],
    'name'        => htmlspecialchars($semster->data['name']),
    'created_at'  => $semster->data['created_at'] 
]);

 redirect('/semster');




