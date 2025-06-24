<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Notes Page';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $db->query(
    'INSERT INTO notess (body, user_id) VALUES (:body, :user_id)',
    [
        'body' => $_POST['body'],
        'user_id' => 1, // Hardcoded current user ID for now
    ]
);
}




require 'views/notes-create.view.php';