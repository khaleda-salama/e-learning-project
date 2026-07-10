<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;


$college = ValidationProcessor::prepare($_POST + $_FILES, $collegeRules = [
    'name' => [
        'validator' => static fn($v): bool => Validator::valid($v, 10, 100),
        'errorKey'  => 'collegeName',
        'message'   => 'اسم الكلية يجب أن تكون على الأقل 10 حروف'
    ],
    'img' => [
        'validator' => static fn($v): bool => Validator::image($v),
        'errorKey'  => 'collegeImg',
        'message'   => 'امتداد الصورة غير مدعوم أو حجمها كبير جدًا'
    ],
    'created_at' => [
        'validator' => static fn($v): bool => Validator::date($v),
        'errorKey'  => 'collegeDate',
        'message'   => 'تاريخ الكلية ليس ضمن الفترة الزمنية المسموحة  (2028-2026)'
    ]
]);

$college->throwErrors();

$imgName = uploadAndCompressImage($college->data['img']);


App::resolve(Database::class)->query('UPDATE collage SET name = :name, img = :img, created_at = :created_at  WHERE id = :id', [    
    'id'          => $college->data['id'],
    'name'        => htmlspecialchars($college->data['name']),
    'img'         => $imgName,
    'created_at'  => $college->data['created_at'] 
]);




 redirect('/collages');


