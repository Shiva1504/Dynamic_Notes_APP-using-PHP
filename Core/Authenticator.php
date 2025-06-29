<?php

namespace Core;

use Core\App;
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
        $_SESSION = [];
        session_destroy();
    
        $params = session_get_cookie_params();
        setcookie('PHPSESSID','', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    
    }

}