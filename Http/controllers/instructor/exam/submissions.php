<?php

use Core\App;
use Core\Database;
use Core\Authorization;
use Core\Session;

$exam = Authorization::checkExam($_GET['id'] ?? '');

$examSubmissions = App::resolve(Database::class)->query(
   'SELECT u.full_name, es.id AS submission_id, es.submitted_at, es.answer_file, es.original_file_name, es.grade, w.course_id AS course_id
    FROM exam_submissions es
    JOIN students s
    ON es.student_id = s.id
    JOIN exams e
    ON es.exam_id = e.id
    JOIN weeks w 
    ON e.week_id = w.id
    JOIN courses c
    ON w.course_id = c.id
    JOIN users u
    ON s.user_id = u.id
    WHERE e.id = :id', [
        'id' => $exam['id'] ?? ''
    ]
    
)->get();


view('instructor/exam/submissions.view.php', [
    'heading' => "تسليمات الطلاب",
    'examsSubmissions' => $examSubmissions,
    'errors'   => Session::get('errors')
]); 