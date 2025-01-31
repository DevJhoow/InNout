<?php

require_once(dirname(__FILE__, 2). '/src/config/config.php');
require_once(dirname(__FILE__, 2). '/src/models/User.php');

$user = new User(['key_Name' => 'value_jonathan']);

print_r($user);
