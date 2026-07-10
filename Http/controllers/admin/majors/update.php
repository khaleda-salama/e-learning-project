<?php

use Core\App;
use Core\Database;
use Core\ValidationProcessor;
use Core\Validator;


 $major = ValidationProcessor::prepare($_POST + $_FILES, $majorRules = [
    'name' => [
        'validator' => static fn($v): bool => Validator::valid($v, 10, 40),
        'errorKey'  => 'majorName',
        'message'   => 'اسم التخصص يجب ان يكون على الأقل 10 حروف'
    ],
    'overview' => [
        'validator' => static fn($v): bool => Validator::valid($v, 10),
        'errorKey'  => 'majorOverview',
        'message'   => 'نبذة التخصص يجب ان تكون على الأقل 10 حروف'
    ],
    'img' => [
        'validator' => static fn($v): bool => Validator::image($v),
        'errorKey'  => 'majorImg',
        'message'   => 'امتداد الصورة غير مدعوم أو حجمها كبير جدًا'
    ],
    'collage_id' => [
        'validator' => static fn($v): bool => Validator::select($v, 'collage'),
        'errorKey'  => 'collage_id',
        'message'   => 'الكلية المختارة غير موجودة'
    ],
]);

$major->throwErrors();

$imgName = uploadAndCompressImage($major->data['img']);


$editMajor = App::resolve(Database::class)->query(
         'UPDATE majors  
          SET    name = :name, overview = :overview, img = :img, collage_id = :collage_id
          WHERE id = :id', [

    'id'          => $major->data['id'],      
    'name'        => htmlspecialchars($major->data['name']),
    'overview'    => htmlspecialchars($major->data['overview']),
    'img'         => $imgName,
    'collage_id'  => $major->data['collage_id']
]);

 redirect('/majors');