<?php

require_once(dirname(__FILE__, 2). '/src/config/config.php');
require_once(dirname(__FILE__, 2). '/src/models/User.php');

$users = User::get([], 'email');

foreach($users as $user) {
    echo $user->email ; 
    echo '<br>';
}