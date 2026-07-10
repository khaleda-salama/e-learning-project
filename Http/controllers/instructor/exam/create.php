<?php

use Core\Database;
use Core\App;
use Core\Session;


$courseExam = App::resolve(Database::class)->query(
   'SELECT w.id AS week_id, i.user_id AS user_id 
    FROM weeks w
    JOIN courses c
    ON w.course_id = c.id
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE w.id = :id', [

  'id'     => $_GET['week_id'] ?? '',
  
])->findOrFail(); 

authorize($courseExam['user_id'] == Session::get('user')['id']);


view('instructor/exam/create.view.php', [
   'heading'    => 'انشاء اختبار جديد',
   'courseExam' => $courseExam,
   'errors'     => Session::get('errors'),
]);


