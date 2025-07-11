<?php

//Home
$router->get('/','index.php');
// About
$router->get('/about','about.php');
// Contact
$router->get('/contact','contact.php');

//Show all Notes
$router->get('/notes','notes/index.php')->only('auth');

// View Note
$router->get('/note','notes/show.php');
// Delete Note
$router->delete('/note','notes/destroy.php');

// Create New Note
$router->get('/create','notes/create.php');
$router->post('/create','notes/store.php');

// Edit Note
$router->get('/edit','notes/edit.php');
$router->patch('/edit','notes/update.php');

// Register Account
$router->get('/register','registration/create.php')->only('guest');
$router->post('/register','registration/store.php')->only('guest');

// Login Account
$router->get('/login','sessions/create.php')->only('guest');
$router->post('/login','sessions/store.php')->only('guest');

// logout
$router->delete('/logout','sessions/destroy.php')->only('auth');
