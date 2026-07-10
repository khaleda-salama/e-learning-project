<?php

use Core\Database;
use Core\App;
use Core\Session;



$courseID = App::resolve(Database::class)->query(
   'SELECT c.id, i.user_id AS user_id
    FROM courses c
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE c.id = :id', [

  'id'            => $_GET['course_id'] ?? '',
])->findOrFail(); 


authorize($courseID['user_id'] == Session::get('user')['id']);



view('instructor/week/create.view.php', [
   'heading'  => 'ادارة الاسابيع',
   'courseID' => $courseID,
   'errors'   => Session::get('errors'),
]);