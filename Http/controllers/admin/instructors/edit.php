<?php


use Core\App;
use Core\Database;
use Core\Session;


$editInstructor = App::resolve(Database::class)->query('SELECT id, user_id, major_id FROM instructors WHERE id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();

$user_id   = App::resolve(Database::class)->query('SELECT id, full_name FROM users WHERE role = :role', [
    'role' => 'instructor' 
])->get();

$major_id = App::resolve(Database::class)->query('SELECT id, name FROM majors')->get();

    
view('admin/instructors/edit.view.php', [
    'instructor'  => $editInstructor,
    'user_id'     => $user_id,
    'major_id'    => $major_id,
    'heading'     => "تعديل بيانات المدرس",
    'errors'      => Session::get('errors'),
]); 