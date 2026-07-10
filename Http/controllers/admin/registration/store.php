<?php

use Core\App;
use Http\Forms\RegisterForm;
use Core\Database;
use Core\Validator;
use Core\Session;


$register = RegisterForm::validate($_POST, $registerRules = [
    'full_name' => [
        'validator' => static fn($v): bool => Validator::full_name($v, 6),
        'errorKey'  => 'full_name',
        'message'   => 'اسم الشخص يجب ان يكون اكثر من 6 حروف ولا يحتوي على رموز و ارقام'
    ],
    'username' => [
        'validator' => static fn($v): bool => Validator::valid($v, 5),
        'errorKey'  => 'username',
        'message'   => 'اسم المستخدم يجب ان يكون اكثر من 5 حروف'
    ],
    'password' => [
        'validator' => static fn($v): bool => Validator::valid($v, 7),
        'errorKey'  => 'password',
        'message'   => 'كلمة المرور يجب ان تكون اكثر من 7 حروف'
    ],
    'role' => [
        'validator' => static fn($v): bool => Validator::role($v),
        'errorKey'  => 'role',
        'message'   => 'دور المستخدم المختار غير موجود'
    ]

]);


$user = App::resolve(Database::class)->query('SELECT username, password, role FROM users WHERE username = :username', [
  
    'username' => $register->data['username']
])->find();

   
if($user) {

    Session::flash('userExist', 'اسم المستخدم هذا موجود بالفعل');
    redirect('admin/dashboard');
} 
    
App::resolve(Database::class)->query('INSERT INTO users(full_name, username, password, role) VALUES(:full_name, :username, :password, :role)',[
    'full_name'     => htmlspecialchars($register->data['full_name']),
    'username'      => htmlspecialchars($register->data['username']),
    'password'      => password_hash($register->data['password'], PASSWORD_DEFAULT),
    'role'          => $register->data['role'],
]);

Session::flash('userRegistered', 'تم تسجيل المستخدم بنجاح');
redirect('admin/dashboard');

