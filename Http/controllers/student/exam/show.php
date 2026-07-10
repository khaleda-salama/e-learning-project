<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Authorization;


$student = App::resolve(Database::class)->query(
    'SELECT id
     FROM students
     WHERE user_id = :user_id',
    [
        'user_id' => Session::get('user')['id']
    ]
)->findOrFail();

$studentId = $student['id'];

$showExam = App::resolve(Database::class)->query(
   'SELECT e.id AS exam_id, e.title, e.description, e.url, e.start_at, e.end_at, c.name AS course_name, c.id AS course_id
    FROM exams e
    JOIN weeks w
    ON e.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    WHERE e.id = :id', [
        'id' => $_GET['id'] ?? ''
    ]
)->findOrFail();

$courseId = Authorization::checkStudentRegisterCourses($showExam['course_id'] ?? '');




$currentTime = time();

$startTime = strtotime($showExam['start_at']);
$endTime = strtotime($showExam['end_at']);

$examStatus = 'not_started';
                                     
if ($currentTime < $startTime) {
    $examStatus = 'not_started';
} elseif ($currentTime >= $endTime) {
    $examStatus = 'ended';
} else {
    $examStatus = 'active';
}


$hasSubmitted  = App::resolve(Database::class)->query(
    'SELECT id, submitted_at 
     FROM exam_submissions
     WHERE exam_id = :exam_id AND student_id = :student_id', [
    'exam_id'    => $showExam['exam_id'],
    'student_id' => $studentId
])->find();




view('student/exam/show.view.php', [
    'exam'         => $showExam,
    'heading'      => "الاختبار",
    'errors'       => Session::get('errors'),
    'examStatus'   => $examStatus,
    'hasSubmitted' => $hasSubmitted
]); 