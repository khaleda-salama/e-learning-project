<?php

use Core\App;
use Core\Database;
use Core\Authorization;


$course = Authorization::checkCourseInstructor($_GET['course_id'] ?? '');

$examCreated = App::resolve(Database::class)->query(
   'SELECT e.id AS exam_id, e.title, e.start_at, e.end_at
    FROM exams e
    JOIN weeks w
    ON e.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    WHERE w.course_id = :course_id', [
        'course_id' => $course['course_id'] ?? ''
    ]
)->get();



view('instructor/exam/created.view.php', [
   'heading' => "الاختبارات المنشئة",
   'exams' => $examCreated,
]); 