<?php

use Core\Session;

view('sessions/create.view.php',[
    'heading' => 'Login Page',
    'errors' => Session::get('errors')
]);