<?php

use Core\App;
use Core\Database;
use Core\Authorization;




$course = Authorization::checkCourseInstructor($_GET['course_id'] ?? '');

$lectures = App::resolve(Database::class)->query(
   'SELECT l.id, l.title, l.url, w.start_date, w.end_date, c.name AS course_name
    FROM lectures l
    JOIN weeks w
    ON l.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    WHERE w.course_id = :course_id',
[
    'course_id'    => $course['course_id'] ?? '',
])->get();
    



view('instructor/lecture/show.view.php', [
    'heading'  => "المحاضرات", 
    'lectures' => $lectures,
]); 