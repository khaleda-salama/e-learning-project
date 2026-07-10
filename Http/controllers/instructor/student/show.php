<?php

use Core\App;
use Core\Database;
use Core\Authorization;



$course = Authorization::checkCourseInstructor($_GET['course_id'] ?? '');

$students = App::resolve(Database::class)->query(
   'SELECT u.full_name AS student_name, u.username AS username, src.course_id AS course_id
    FROM student_register_courses src
    JOIN students s
    ON src.student_id = s.id
    JOIN courses c
    ON src.course_id = c.id
    JOIN users u
    ON s.user_id = u.id
    WHERE src.course_id = :course_id',
[
    'course_id'    => $course['course_id']
])->get();
    



view('instructor/student/show.view.php', [
    'heading'  => "الطلاب/ة", 
    'students' => $students,
]); 