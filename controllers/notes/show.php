<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notess where id = :id',[
'id' => $_GET['id']
])->findOrfail();

authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);    

view('notes/show.view.php',[
    'heading' => 'Note',
    'note' => $note
]);
