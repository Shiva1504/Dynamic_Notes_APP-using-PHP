<?php

namespace Core;

use Core\App;
use Core\Session;
class Authenticator{
    public function attempt($email, $password){

        $user = App::resolve('core\Database')->query('select * from user where email = :email', [
            'email' => $email
        ])->find();
        
        if (password_verify($password, $user['password'])) {
                    $this->login([
                        'email' => $email
                    ]);
            return true;
        }
        return false;
    }

    function login(array $user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
    
        session_regenerate_id(true);
    
    }
    
    function logout(){
        
        Session::destroy();
    }

}