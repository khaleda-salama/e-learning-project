<?php


use Core\App;
use Core\Authorization;
use Core\Database;
use Core\Session;


$student = App::resolve(Database::class)->query(
    'SELECT id
     FROM students
     WHERE user_id = :user_id',
    [
        'user_id' => Session::get('user')['id']
    ]
)->findOrFail();

$studentId = $student['id'];


$courseId = Authorization::checkStudentRegisterCourses($_GET['course_id'] ?? '');

$evaluation = App::resolve(Database::class)->query(
    'SELECT  e.title, e.total_grade, es.grade, es.id AS submission_id
     FROM exams e
     JOIN weeks w
     ON e.week_id = w.id
     JOIN courses c
     ON w.course_id = c.id
     LEFT JOIN exam_submissions es
     ON es.exam_id = e.id
     AND es.student_id = :student_id
     WHERE c.id = :course_id',
    [
        'student_id' => $studentId,
        'course_id'  => $courseId ?? ''
    ]

)->get();




view('student/evaluation/show.view.php', [
   'evaluations' => $evaluation
]); 