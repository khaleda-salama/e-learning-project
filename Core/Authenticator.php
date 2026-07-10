<?php

namespace Core;
use Core\App;
use Core\Database;
use Core\Session;

class Authenticator {

    public function attempt(string $username, string|int $password): bool {

        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE username = :username', [
               'username' => $username, 
             ])->find();
            
        if($user) {  

            if(password_verify($password, $user['password'])) {

                $this->login([
                    'username'   => $username,
                    'full_name'  => $user['full_name'],
                    'role'       => $user['role'],
                    'id'         => $user['id'],
                ]);

                return true; 
            }
        }
        return false;   
    }

    public function login(array $user): void {

        $_SESSION['user'] = [
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'role'       => $user['role'],
            'id'         => $user['id'],
        ];

        session_regenerate_id(true);
    }

   public function logout(): void {
       
    Session::destroy();
   }
     

}