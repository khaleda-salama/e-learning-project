<?php

use Core\App;
use Core\Database;
use Core\Session;


$student = App::resolve(Database::class)->query(
    'SELECT id
     FROM students
     WHERE user_id = :user_id',
    [
        'user_id' => Session::get('user')['id']
    ]
)->findOrFail();

$studentId = $student['id'];



$myCourses = App::resolve(Database::class)->query(
    'SELECT c.name, m.name AS major_name, src.course_id AS course_id 
     FROM courses c
     JOIN student_register_courses src
     ON src.course_id = c.id
     JOIN majors m
     ON c.major_id = m.id
     WHERE src.student_id = :student_id', [
        'student_id' => $studentId
     ]
)->get();


 view('student/dashboard.view.php', [
     'heading'        => 'مساقتي الدراسية',
     'myCourses'      => $myCourses,
     'fullName'       => "مرحباً " . explode(' ',  Session::get('user')['full_name'])[0]. " ! 👋"
]);