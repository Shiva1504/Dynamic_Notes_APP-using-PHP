
<?php

use Core\App;
use Core\Validator;
use Core\Authenticator;


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if(! Validator::email($email)){
    $errors['email'] = 'Please enter a vaild email address';
}

if (! Validator::string($password,7,20)){
    $errors['password'] = 'password length should be more than 7';
}

if (!empty($errors)){

    return view('registration/create.view.php',[
    'heading' => ' Register',
    'errors' => $errors
    ]);

}


$db = App::resolve('core\Database');

$user = $db->query('select * from user where email = :email',[
    'email' => $email
])->find();

if ($user){
    header('location: /Section2/register');
    exit();
}
else{
    $db->query('INSERT INTO user (email, password) VALUES (:email, :password)',
        [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]
    );
    
    $user = $db->query('select * from user where email = :email', [
        'email' => $email
    ])->find();

    $auth = new Authenticator();

    $auth->login($user);

    header('location: /Section2/public');
    exit();
}