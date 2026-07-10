<?php


namespace Core\Middleware;
use Core\Session;

class Student {

   public function handle() {

      $user = Session::get('user');

      if(!$user) {
          redirect('/');
      }

      if($user['role'] !== 'student') {  
        redirect('/');
      }   
   }
}