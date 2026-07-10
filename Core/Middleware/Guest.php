<?php



namespace Core\Middleware;
use Core\Session;

class Guest {

   public function handle(): void {
    
     if(Session::get('user')['username'] ?? false) {
           
         $role = Session::get('user')['role'];
         $redirectUrl = match($role) {
            'admin'      => '/admin/dashboard',
            'instructor' => '/instructor/dashboard',
            'student'    => '/student/dashboard',
             default      => '/',
         };
         
         redirect($redirectUrl); 
       
     }  

   }

}