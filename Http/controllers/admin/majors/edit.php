<?php


use Core\App;
use Core\Database;
use Core\Session;


$editMajor = App::resolve(Database::class)->query('SELECT id, name, overview, collage_id FROM majors WHERE id = :id', [
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();

$collage_id = App::resolve(Database::class)->query('SELECT id, name FROM collage')->get();

    
view('admin/majors/edit.view.php', [
    'major' => $editMajor,
    'collage_id'  => $collage_id,
    'errors' => Session::get('errors'),
    'heading' => "تعديل التخصص"
]); 