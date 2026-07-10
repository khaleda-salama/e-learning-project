<?php


namespace Core\Middleware;
use Core\Session;

class Admin {

   public function handle() {

      $user = Session::get('user');

      if(!$user) {
          redirect('/');
      }

      if($user['role'] !== 'admin') {  
        redirect('/');
      }   
   }
}