<?php

use Core\App;
use Core\Database;

$course = App::resolve(Database::class)->query(
   'SELECT c.id, c.name, c.hour_num, c.level_year, m.name 
    AS major_name , s.name 
    AS semster_name, u.full_name
    AS instructor_name
    FROM courses c
    JOIN majors m
    ON c.major_id = m.id 
    JOIN semster s
    ON c.semster_id = s.id 
    JOIN instructors i
    ON c.instructor_id = i.id 
    JOIN users u
    ON i.user_id = u.id
    WHERE c.id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();



view('admin/courses/show.view.php', [
    'course' => $course,
    'heading' => "المساق"
]); 