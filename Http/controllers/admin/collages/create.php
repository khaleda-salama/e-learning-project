<?php

use Core\Session;

view('admin/collages/create.view.php', [
    'heading' => 'انشاء كلية',
    'errors' => Session::get('errors'),
]);