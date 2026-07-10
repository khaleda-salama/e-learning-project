<?php


use Core\App;
use Core\Database;
use Core\Session;


$editSemster = App::resolve(Database::class)->query('SELECT * FROM semster WHERE id = :id',[
    
    'id' => $_GET['id'] ?? ''
])->findOrFail();
    


view('admin/semster/edit.view.php', [
    'semster' => $editSemster,
    'heading' => "تعديل الفصل الدراسي",
    'errors' => Session::get('errors')

]); 