<?php 

use Core\Authenticator;

$auth = new Authenticator();

$auth->logout();

header("location: /Section2/login");
exit();