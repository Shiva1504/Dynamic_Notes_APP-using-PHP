<?php

use Core\Database;
use Core\Response;
use Core\App;

$db = App::resolve('core\Database');

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $note = $db->query('select * from notess where id = :id',[
        'id' => $_POST['id']
        ])->findOrfail();
    
    authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);
    
    $db->query('delete from notess where id = :id',[
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();    
}

