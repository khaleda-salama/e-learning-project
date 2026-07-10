<?php


use Core\App;
use Core\Database;
use Core\Session;

$studentsRegisterCourses = App::resolve(Database::class)->query(
    'SELECT c.id AS course_id, c.name, c.hour_num, c.level_year, sm.name AS semster_name, u.full_name AS instructor_name
     FROM students s
     JOIN courses c
     ON s.major_id = c.major_id
     JOIN semster sm
     ON c.semster_id = sm.id
     JOIN instructors i
     ON c.instructor_id = i.id
     JOIN users u
     ON i.user_id = u.id
     WHERE s.user_id = :student_id', [
        'student_id' => Session::get('user')['id']
     ]    
)->get();


view('student/majorCourses.view.php', [
    'heading'                 => 'تسجيل المواد الدراسية',
    'studentsRegisterCourses' => $studentsRegisterCourses,
]);