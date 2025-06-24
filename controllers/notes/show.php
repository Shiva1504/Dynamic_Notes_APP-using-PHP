<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;
$note = $db->query('select * from notess where id = :id',[
    'id' => $_GET['id']
    ])->findOrfail();


authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);

require 'views/notes/show.view.php';