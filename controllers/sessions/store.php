<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please enter a valid password';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
        'heading' => 'Sign in',
        'errors' => $errors
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