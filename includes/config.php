<?php

//database credentials

define('DB_NAME', 'mini-blog');
define('DB_HOST', 'localhost');
define('DB_USER', 'zekri');
define('DB_PASS', '1234');


$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'functions.php';
