<?php


use Core\App;
use Core\Database;
use Core\Session;



$editCourse = App::resolve(Database::class)->query('SELECT id, name, instructor_id, hour_num, level_year, major_id, semster_id FROM courses WHERE id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();


$instructor_id = App::resolve(Database::class)->query(
   'SELECT i.id, u.full_name
    AS instructor_name, m.name 
    AS major_name, i.major_id 
    FROM users u 
    JOIN instructors i
    ON i.user_id = u.id
    JOIN majors m  
    ON i.major_id = m.id'
)->get();

$major_id = App::resolve(Database::class)->query('SELECT id, name FROM majors')->get();
$semster_id = App::resolve(Database::class)->query('SELECT id, name FROM semster')->get();

    
view('admin/courses/edit.view.php', [
    'heading'       => "تعديل المساق",
    'course'        => $editCourse,
    'instructor_id' => $instructor_id,
    'major_id'      => $major_id,
    'semster_id'    => $semster_id,
    'errors'        => Session::get('errors'),
]); 