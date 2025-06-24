
<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create Notes Page';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $errors = [];


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




require 'views/notes/create.view.php';