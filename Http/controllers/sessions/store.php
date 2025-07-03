<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;

$form = LoginForm::validate($attributes = [
    'email'=> $_POST['email'], 
    'password'=> $_POST['password']
    ]);

$SignedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (!$SignedIn) {
    $form->error('email', 'You have provided credentials are incorrect')->throw();
}

redirect('/');


// Session::flash('errors', ['email' => 'You have provided credentials are incorrect']);
// Session::flash('old', $attributes);
// redirect('/login');