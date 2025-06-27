<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve('core\Database');

$notes = $db->query('select * from notess where user_id = 1')->get();


view('notes/index.view.php',[
    'heading' => 'Notes Page',
    'notes' => $notes
]);