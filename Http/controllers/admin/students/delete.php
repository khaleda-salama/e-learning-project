<?php


use Core\App;
use Core\Database;


App::resolve(Database::class)->query('DELETE FROM students WHERE id = :id', [

   'id' => $_POST['id']
]);

redirect('/students');