<?php


use Core\App;
use Core\Database;


$semster = App::resolve(Database::class)->query('SELECT * FROM semster WHERE id = :id',[
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();
    


view('admin/semster/show.view.php', [
    'semster' => $semster,
    'heading' => "الفصل الدراسي"
]); 