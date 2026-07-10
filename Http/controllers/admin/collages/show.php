<?php


use Core\App;
use Core\Database;


$collage = App::resolve(Database::class)->query('SELECT * FROM collage WHERE id = :id',[
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();
    


view('admin/collages/show.view.php', [
    'collage' => $collage,
    'heading' => "الكلية"
]); 