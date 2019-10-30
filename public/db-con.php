<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', 'azizidev*#369');
define('DB_NAME', 'azizi_live_db');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    exit('Connect failed: ' . mysqli_connect_error());
} else {
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("SET CHARACTER SET utf8");
}
