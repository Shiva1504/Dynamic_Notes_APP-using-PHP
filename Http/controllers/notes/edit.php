<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve('core\Database');
$currentUserId = 1;

$note = $db->query('select * from notess where id = :id',[
'id' => $_GET['id']
])->findOrfail();

authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);    

view('notes/edit.view.php',[
    'heading' => 'Edit Note',
    'note' => $note
]);
