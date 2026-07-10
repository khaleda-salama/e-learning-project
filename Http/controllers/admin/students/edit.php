<?php


use Core\App;
use Core\Database;
use Core\Session;


$editStudent = App::resolve(Database::class)->query('SELECT id, user_id, academic_year, major_id FROM students WHERE id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();

$user_id   = App::resolve(Database::class)->query('SELECT id, full_name FROM users WHERE role = :role', [
    'role' => 'student' 
])->get();

$major_id = App::resolve(Database::class)->query('SELECT id, name FROM majors')->get();

    
view('admin/students/edit.view.php', [
    'student'   => $editStudent,
    'user_id'   => $user_id,
    'major_id'  => $major_id,
    'heading'   => "تعديل بيانات الطالب/ة",
    'errors'    => Session::get('errors'),
]); 