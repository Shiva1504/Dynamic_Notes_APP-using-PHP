<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
  

$notes = $db->query('select * from notess where user_id = 1')->get();


view('notes/index.view.php',[
    'heading' => 'Notes Page',
    'notes' => $notes
]);