<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$form = LoginForm::validate($data = [
   
   'username' => $_POST['username'],
   'password' => $_POST['password']  
]);

$auth = new Authenticator();

$login = $auth->attempt(
   
   $data['username'],
   $data['password']
);

if(!$login) {
   $form->error(
   
      'user', 'لا يوجد حساب مطابق لكلمة المرور أو اسم المسخدم المكتوب'
   )->throw();
}


$admin      = Session::get('user')['role'] === 'admin';
$instructor = Session::get('user')['role'] === 'instructor';

$redirectUrl = $admin ? '/admin/dashboard' : ($instructor ? '/instructor/dashboard' : '/student/dashboard');
   
redirect($redirectUrl);
 











      
      

    
