<?php

$router->get('/Section2/public/','controllers/index.php');
$router->get('/Section2/about','controllers/about.php');
$router->get('/Section2/contact','controllers/contact.php');

$router->get('/Section2/notes','controllers/notes/index.php');
$router->get('/Section2/note','controllers/notes/show.php');
$router->get('/Section2/create','controllers/notes/create.php');
