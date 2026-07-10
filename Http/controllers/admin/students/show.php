<?php

use Core\App;
use Core\Database;

$student = App::resolve(Database::class)->query(
    'SELECT s.id, s.academic_year, u.full_name
     AS full_name, m.name AS major_name, c.name 
     AS collage_name 
     FROM students s
     JOIN users u 
     ON s.user_id = u.id
     JOIN majors m 
     ON s.major_id = m.id
     JOIN collage c  
     ON m.collage_id = c.id
     WHERE s.id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();



view('admin/students/show.view.php',[
    'heading'  => 'طالب/ة',
    'student' => $student
]);


