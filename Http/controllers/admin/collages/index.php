<?php


use Core\App;
use Core\Database;



$collages = App::resolve(Database::class)->query('SELECT * FROM collage')->get();


view('admin/collages/index.view.php', [
    'collages' => $collages,
    'heading' => 'الكليات'
]); 