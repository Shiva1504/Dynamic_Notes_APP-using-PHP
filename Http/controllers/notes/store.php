
<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('core\Database');

$errors = [];

if (! Validator::string($_POST['body'],1,1000)){
    $errors['body'] = 'Body is should not more than 1000 characters.';
}

if (!empty($errors)){

    return view('notes/create.view.php',[
    'heading' => 'Create Notes',
    'errors' => $errors
    ]);

}


$db->query('INSERT INTO notess (body, user_id) VALUES (:body, :user_id)',
    [
        'body' => $_POST['body'],
        'user_id' => 1, // Hardcoded current user ID for now
    ]
);

header('location: //notes');
die();