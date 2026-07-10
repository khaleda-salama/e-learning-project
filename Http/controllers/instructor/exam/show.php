<?php

use Core\App;
use Core\Database;
use Core\Authorization;


$exam = Authorization::checkExam($_GET['id'] ?? '');


$showExam = App::resolve(Database::class)->query(
   'SELECT e.id AS exam_id, e.title, e.description, e.url, e.start_at, e.end_at, w.course_id AS course_id, c.name AS course_name
    FROM exams e
    JOIN weeks w
    ON e.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    WHERE e.id = :id', [
     'id' => $exam['id'] ?? ''
    ]
)->findOrFail();



view('instructor/exam/show.view.php', [
    'exam' => $showExam,
    'heading' => "الاختبار",
]); 