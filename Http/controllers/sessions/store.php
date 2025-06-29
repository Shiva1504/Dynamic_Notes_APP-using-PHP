<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms;
use Http\Forms\LoginForm;

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$form = new LoginForm();
if(! $form->validate($email, $password)){
    return view('sessions/create.view.php', [
        'heading' => 'Sign in',
        'errors' => $form->errors()
    ]);
}



$db = App::resolve('core\Database');

$user = $db->query('select * from user where email = :email', [
    'email' => $email
])->find();

if (!$user || !password_verify($password, $user['password'])) {
    return view('sessions/create.view.php', [
        'errors' => [
            'password' => 'The provided credentials are incorrect.'
        ]
    ]);
}

login([
    'email' => $email
]);

header('location: /Section2/public');
exit();