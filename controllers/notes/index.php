<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Notes Page';

$notes = $db->query('select * from notess where user_id = 1')->get();


require 'views/notes/index.view.php';