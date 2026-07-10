<?php

use Core\Database;
use Core\App;
use Core\Session;


$courseLecture = App::resolve(Database::class)->query(
   'SELECT l.id, l.title, l.url, l.week_id AS week_id, i.user_id AS user_id
    FROM lectures l
    JOIN weeks w
    ON l.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE l.id = :id', [

  'id'      =>  $_GET['id'] ?? '',
  
])->findOrFail(); 

authorize($courseLecture['user_id'] == Session::get('user')['id']);

view('instructor/lecture/edit.view.php', [
   'heading'       => 'تعديل محاضرات',
   'courseLecture' => $courseLecture,
   'errors'        => Session::get('errors'),
]);


