<?php

use Core\App;
use Core\Database;
use Core\Session;

$numberOfStudents    = App::resolve(Database::class)->query('SELECT COUNT(id) AS students FROM users WHERE role = "student"')->find()['students'];
$numberOfInstructors = App::resolve(Database::class)->query('SELECT COUNT(id) AS instructors FROM users WHERE role = "instructor"')->find()['instructors'];
$numberOfCollages    = App::resolve(Database::class)->query('SELECT COUNT(id) AS collages FROM collage')->find()['collages'];
$numberOfMajors      = App::resolve(Database::class)->query('SELECT COUNT(id) AS majors FROM majors')->find()['majors'];


view("admin/dashboard.view.php", [
  "students"    => $numberOfStudents,
  "instructors" => $numberOfInstructors,
  "collages"    => $numberOfCollages,
  "majors"      => $numberOfMajors,
  'fullName'    => "مرحباً أ." . explode(' ',   Session::get('user')['full_name'])[0]. " ! 👋"
]);  
  