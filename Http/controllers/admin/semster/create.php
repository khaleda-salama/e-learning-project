<?php

use Core\Session;

view('admin/semster/create.view.php', [
    'heading' => 'انشاء الفصل الدراسي',
    'errors' => Session::get('errors'),
]);