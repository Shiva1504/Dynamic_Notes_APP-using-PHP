<?php

$router->get('/Section2/public/','index.php');
$router->get('/Section2/about','about.php');
$router->get('/Section2/contact','contact.php');

$router->get('/Section2/notes','notes/index.php')->only('auth');

$router->get('/Section2/note','notes/show.php');
$router->delete('/Section2/note','notes/destroy.php');

$router->get('/Section2/create','notes/create.php');
$router->post('/Section2/create','notes/store.php');

$router->get('/Section2/edit','notes/edit.php');
$router->patch('/Section2/edit','notes/update.php');

$router->get('/Section2/register','registration/create.php')->only('guest');
$router->post('/Section2/register','registration/store.php')->only('guest');

$router->get('/Section2/login','sessions/create.php')->only('guest');
$router->post('/Section2/login','sessions/store.php')->only('guest');

$router->delete('/Section2/logout','sessions/destroy.php')->only('auth');