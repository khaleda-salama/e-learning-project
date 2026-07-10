<?php


use Core\App;
use Core\Database;


$major = App::resolve(Database::class)->query(
         'SELECT m.id, m.name, m.overview, m.img, c.name AS collage_name
          FROM majors m 
          JOIN collage c 
          ON m.collage_id = c.id
          WHERE m.id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();
    


view('admin/majors/show.view.php', [
    'major' => $major,
    'heading' => "التخصص"
]); 