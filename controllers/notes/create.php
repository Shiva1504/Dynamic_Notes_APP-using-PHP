
<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (! Validator::string($_POST['body'],1,1000)){
        $errors['body'] = 'Body is should not more than 1000 characters.';
    }
    
    if (empty($errors)){
            $db->query('INSERT INTO notess (body, user_id) VALUES (:body, :user_id)',
                [
                    'body' => $_POST['body'],
                    'user_id' => 1, // Hardcoded current user ID for now
                ]
            );
    }
}



view('notes/create.view.php',[
    'heading' => 'Create Notes',
    'errors' => $errors
]);