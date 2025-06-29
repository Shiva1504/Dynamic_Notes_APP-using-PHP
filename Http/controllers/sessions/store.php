<?php

use Core\App;
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$form = new LoginForm();
if($form->validate($email, $password)){
    
    $auth = new Authenticator();
    if ($auth->attempt($email, $password)){
        redirect('/Section2/public');
    }
    $form->error('email', 'You have provided credentials are incorrect');
}

Session::flash('errors', $form->errors());

redirect('/Section2/login');