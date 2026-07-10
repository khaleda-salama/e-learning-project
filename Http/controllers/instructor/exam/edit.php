<?php

use Core\Database;
use Core\App;
use Core\Session;


$courseExam = App::resolve(Database::class)->query(
   'SELECT e.id, e.title, e.description, e.week_id, e.start_at, e.end_at, e.total_grade, i.user_id AS user_id
    FROM exams e
    JOIN weeks w
    ON e.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE e.id = :id', [

  'id'   => $_GET['id'] ?? '',
  
])->findOrFail(); 

authorize($courseExam['user_id'] == Session::get('user')['id']);

view('instructor/exam/edit.view.php', [
   'heading'  => 'تعديل الاختبار ',
   'courseExam' => $courseExam,
   'errors'   => Session::get('errors'),
]);


