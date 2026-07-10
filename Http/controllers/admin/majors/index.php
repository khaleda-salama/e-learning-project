<?php



use Core\App;
use Core\Database;

$majors = App::resolve(Database::class)->query(
    'SELECT m.id, m.name, m.overview, m.img, c.name
     AS collage_name
     FROM majors m 
     JOIN collage c 
     ON m.collage_id = c.id'
)->get();



view('admin/majors/index.view.php', [
    'heading' => 'التخصصات',
    'majors' => $majors,
]);