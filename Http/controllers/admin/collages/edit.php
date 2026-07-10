<?php

use Core\App;
use Core\Database;
use Core\Session;


$editCollage = App::resolve(Database::class)->query('SELECT id, name, created_at FROM collage WHERE id = :id',[

    'id' => $_GET['id'] ?? ''
])->findOrFail();

view('admin/collages/edit.view.php', [
    'heading' => 'تعديل الكلية',
    'errors' => Session::get('errors'),
    'collage' => $editCollage
]);