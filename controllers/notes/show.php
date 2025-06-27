<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::container()->resolve('core\Database');
$currentUserId = 1;

$note = $db->query('select * from notess where id = :id',[
'id' => $_GET['id']
])->findOrfail();

authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);    

view('notes/show.view.php',[
    'heading' => 'Note',
    'note' => $note
]);
