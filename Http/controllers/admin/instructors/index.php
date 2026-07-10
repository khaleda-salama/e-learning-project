<?php

use Core\App;
use Core\Database;

$instructors = App::resolve(Database::class)->query(
    'SELECT i.id, u.full_name
     AS full_name, m.name AS major_name, c.name 
     AS collage_name 
     FROM instructors i
     JOIN users u 
     ON i.user_id = u.id
     JOIN majors m 
     ON i.major_id = m.id
     JOIN collage c  
     ON m.collage_id = c.id'
)->get();



view('admin/instructors/index.view.php',[
    'heading'  => 'المدرسين',
    'instructors' => $instructors
]);