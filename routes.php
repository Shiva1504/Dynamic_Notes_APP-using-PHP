<?php

$router->get('/Section2/public/','controllers/index.php');
$router->get('/Section2/about','controllers/about.php');
$router->get('/Section2/contact','controllers/contact.php');

$router->get('/Section2/notes','controllers/notes/index.php');

$router->get('/Section2/note','controllers/notes/show.php');
$router->delete('/Section2/note','controllers/notes/destroy.php');

$router->get('/Section2/create','controllers/notes/create.php');
$router->post('/Section2/create','controllers/notes/store.php');

$router->get('/Section2/edit','controllers/notes/edit.php');
$router->patch('/Section2/edit','controllers/notes/update.php');

$router->get('/Section2/register','controllers/registration/create.php');
$router->post('/Section2/register','controllers/registration/store.php');