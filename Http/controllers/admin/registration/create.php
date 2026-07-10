<?php
  
use Core\Session;


view('admin/registration/create.view.php', [

  'errors' => Session::get('errors')
]);
      
      
