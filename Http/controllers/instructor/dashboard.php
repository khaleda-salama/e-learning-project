<?php

use Core\App;
use Core\Database;
use Core\Session;

$userID = Session::get('user')['id'];

$courses = App::resolve(Database::class)->query(
    'SELECT
        c.id,
        c.name AS course_name,
        s.name AS semster_name,
        c.level_year,
        COUNT(DISTINCT src.student_id) AS student_count
     FROM courses c
     JOIN semster s
        ON c.semster_id = s.id
     JOIN instructors i
        ON c.instructor_id = i.id
     LEFT JOIN student_register_courses src
        ON c.id = src.course_id
     WHERE i.user_id = :instructorID
     GROUP BY c.id',
     [
        'instructorID' => $userID
     ]
)->get();


$courseCount = App::resolve(Database::class)->query(
      'SELECT COUNT(c.id) 
       AS course_count
       FROM courses c
       JOIN instructors i 
       ON c.instructor_id = i.id 
       WHERE i.user_id = :instructorID', 
       ['instructorID' => $userID]
       
)->find()['course_count'];

$examCount = App::resolve(Database::class)->query(
      'SELECT COUNT(e.id) 
       AS exam_count
       FROM exams e
       JOIN weeks w 
       ON e.week_id = w.id 
       JOIN courses c
       ON w.course_id = c.id
       JOIN instructors i
       ON c.instructor_id = i.id
       WHERE i.user_id = :instructorID', 
       ['instructorID' => $userID]
       
)->find()['exam_count'];

$studentCount = App::resolve(Database::class)->query(
      'SELECT COUNT(DISTINCT src.student_id) 
       AS student_count
       FROM student_register_courses src
       JOIN courses c
       ON src.course_id = c.id
       JOIN instructors i
       ON c.instructor_id = i.id
       WHERE i.user_id = :instructorID', 
       ['instructorID' => $userID]
)->find()['student_count'];



view("instructor/dashboard.view.php", [
        
      'courses'      => $courses,
      'courseCount'  => $courseCount,
      'examCount'    => $examCount,
      'studentCount'    => $studentCount,
      'fullName'    => "مرحباً د." . explode(' ',   Session::get('user')['full_name'])[0]. " ! 👋"
]);
  