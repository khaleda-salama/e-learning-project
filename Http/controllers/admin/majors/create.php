<?php


use Core\App;
use Core\Database;
use Core\Session;


$collage_id = App::resolve(Database::class)->query('SELECT id, name FROM collage')->get();

view('admin/majors/create.view.php', [
    'heading' => 'انشاء التخصص',
    'errors'  => Session::get('errors'),
    'collage_id'  => $collage_id
]);