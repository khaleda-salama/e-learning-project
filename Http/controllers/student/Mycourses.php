<?php

use Core\App;
use Core\Authorization;
use Core\Database;



$coursId = Authorization::checkStudentRegisterCourses($_GET['id'] ?? '');

$course = App::resolve(Database::class)->query(
   'SELECT c.id, c.name 
    FROM courses c
    WHERE c.id = :id', [
    
    'id'   =>  $coursId ?? '',

])->findOrFail();



$weeks = App::resolve(Database::class)->query(
    'SELECT id, start_date, end_date 
     FROM weeks
     WHERE course_id = :course_id', [
        'course_id' => $coursId 
    ]
)->get();


$files = App::resolve(Database::class)->query(
    'SELECT f.id AS file_id, f.title, f.url, f.week_id AS week_id
     FROM files f
     JOIN weeks w
     ON f.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $coursId
    ]
)->get();


$lectures = App::resolve(Database::class)->query(
    'SELECT l.id AS lecture_id, l.title, l.url, l.week_id AS week_id, w.course_id
     FROM lectures l
     JOIN weeks w
     ON l.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $coursId
    ]
)->get();

$exams = App::resolve(Database::class)->query(
    'SELECT e.id AS exam_id, e.title, e.week_id AS week_id, w.course_id
     FROM exams e
     JOIN weeks w
     ON e.week_id = w.id
     WHERE w.course_id = :course_id ', [
        'course_id' => $coursId
    ]
)->get();



view('student/Mycourses.view.php', [
    'heading'        => 'محتوى المساق',
    'course'         => $course,
    'weeks'          => $weeks,
    'files'          => $files,
    'lectures'       => $lectures,
    'exams'          => $exams
]);