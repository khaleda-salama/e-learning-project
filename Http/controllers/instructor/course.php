<?php

use Core\App;
use Core\Database;
use Core\Session;

$course = App::resolve(Database::class)->query(
   'SELECT c.id, c.name, i.user_id AS user_id 
    FROM courses c
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE c.id = :id', [
    
    'id'   =>  $_GET['id'] ?? '',

])->findOrFail();


$week = App::resolve(Database::class)->query(
    'SELECT id, start_date, end_date 
     FROM weeks
     WHERE course_id = :course_id', [
        'course_id' => $_GET['id'] ?? '' 
    ]
)->get();


$files = App::resolve(Database::class)->query(
    'SELECT f.id AS file_id, f.title, f.url, f.week_id AS week_id
     FROM files f
     JOIN weeks w
     ON f.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $_GET['id'] ?? ''
    ]
)->get();


$lectures = App::resolve(Database::class)->query(
    'SELECT l.id AS lecture_id, l.title, l.url, l.week_id AS week_id, w.course_id
     FROM lectures l
     JOIN weeks w
     ON l.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $_GET['id'] ?? ''
    ]
)->get();

$exams = App::resolve(Database::class)->query(
    'SELECT e.id AS exam_id, e.title, e.week_id AS week_id, w.course_id
     FROM exams e
     JOIN weeks w
     ON e.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $_GET['id'] ?? ''
    ]
)->get();


authorize($course['user_id'] == Session::get('user')['id']);


view('instructor/course.view.php', [
    'course'           => $course,
    'weeks'            => $week,
    'files'            => $files,
    'lectures'         => $lectures,
    'exams'            => $exams,
    'heading'          => 'ادارة المساق',
]);