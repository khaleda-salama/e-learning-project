<?php

use Core\Database;
use Core\App;
use Core\Session;


$courseWeeks = App::resolve(Database::class)->query(
   'SELECT c.id, w.id AS week_id, w.start_date, w.end_date, i.user_id AS user_id
    FROM weeks w
    JOIN courses c 
    ON w.course_id = c.id
    JOIN instructors i
    ON c.instructor_id = i.id
    WHERE w.id = :id', [

  'id'            => $_GET['id'] ?? '',
])->findOrFail(); 

authorize($courseWeeks['user_id'] == Session::get('user')['id']);


view('instructor/week/edit.view.php', [
   'heading'  => 'ادارة الاسابيع',
   'courseWeeks' => $courseWeeks,
   'errors'   => Session::get('errors'),
]);