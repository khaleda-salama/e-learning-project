<?php

use Core\App;
use Core\Authorization;
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


$exists = App::resolve(Database::class)->query(
    'SELECT id
     FROM student_register_courses 
     WHERE student_id = :student_id
     AND course_id = :course_id',
    [
        'student_id' => $studentId,
        'course_id'  => $_POST['course_id']
    ]
)->find();


if($exists) {
    Session::flash('courseIsRegistered', 'هذا المساق مسجل');
    redirect('/student/courses/major');
} 


    
$registerCourse = App::resolve(Database::class)->query(
        'INSERT INTO student_register_courses (student_id, course_id) VALUES (:student_id, :course_id)', [
            'student_id' => $studentId,
            'course_id'  => $_POST['course_id']
        ]
);

redirect('/student/dashboard');