<?php


namespace Core\Middleware;
use Core\Session;

class Instructor {

   public function handle() {

      $user = Session::get('user');

      if(!$user) {
          redirect('/');
      }

      if($user['role'] !== 'instructor') {  
        redirect('/');
      }   
   }
}