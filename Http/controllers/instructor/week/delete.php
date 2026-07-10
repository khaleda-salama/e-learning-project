<?php

use Core\App;
use Core\Database;


App::resolve(Database::class)->query('DELETE FROM weeks WHERE id = :id', [

   'id' => $_POST['id']
]);

redirect('/instructor/course?id='.$_POST['course_id']);