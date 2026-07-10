<?php

use Core\Database;
use Core\App;
use Core\Session;

$user_id   = App::resolve(Database::class)->query('SELECT id, full_name FROM users WHERE role = :role', [
    'role' => 'student' 
])->get();

$major_id = App::resolve(Database::class)->query('SELECT id, name FROM majors')->get();


view('admin/students/create.view.php', [
    'heading' => 'تسجيل طالب/ة',
    'errors' => Session::get('errors'),
    'user_id' => $user_id,
    'major_id' => $major_id
]);