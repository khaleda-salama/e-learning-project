<?php


use Core\App;
use Core\Database;


App::resolve(Database::class)->query('DELETE FROM instructors WHERE id = :id', [

   'id' => $_POST['id']
]);

redirect('/instructors');