<?php

use Core\Database;
use Core\App;
use Core\Session;


$courseLecture = App::resolve(Database::class)->query(
   'SELECT w.id AS week_id, i.user_id AS user_id
    FROM weeks w
    JOIN courses c
    ON w.course_id = c.id
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE w.id = :id', [

  'id'            => $_GET['week_id'] ?? '',
  
])->findOrFail(); 

authorize($courseLecture['user_id'] == Session::get('user')['id']);

view('instructor/lecture/create.view.php', [
   'heading'       => 'انشاء المحاضرات',
   'courseLecture' => $courseLecture,
   'errors'        => Session::get('errors'),
]);


