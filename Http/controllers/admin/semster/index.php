<?php

use Core\App;
use Core\Database;

$semsters = App::resolve(Database::class)->query('SELECT * FROM semster')->get();


view('admin/semster/index.view.php',[
    'heading'  => 'الفصول الدراسية',
    'semsters' => $semsters
]);