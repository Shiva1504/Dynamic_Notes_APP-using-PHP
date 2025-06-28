<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Response;

$db = App::resolve('core\Database');
$currentUserId = 1;


$note = $db->query('select * from notess where id = :id',[
'id' => $_POST['id']
])->findOrfail();

authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);    

$errors = [];

if (! Validator::string($_POST['body'],1,1000)){
    $errors['body'] = 'Body is should not more than 1000 characters.';
}

if(count($errors)){
    return view('notes/edit.view.php',[
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
]);

}

$db->query('UPDATE notess SET body = :body WHERE id = :id',[
    'body' => $_POST['body'], 
    'id' => $_POST['id']]
);

header('location: /Section2/notes');
die();