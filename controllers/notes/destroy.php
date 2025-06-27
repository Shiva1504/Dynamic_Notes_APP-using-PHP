<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $note = $db->query('select * from notess where id = :id',[
        'id' => $_POST['id']
        ])->findOrfail();
    
    authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);
    
    $db->query('delete from notess where id = :id',[
        'id' => $_POST['id']
    ]);

    header('location: /Section2/notes');
    exit();    
}

