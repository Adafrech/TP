<?php
$host = 'mysql-adafrech.alwaysdata.net';
$db = 'adafrech_crud';
$user = 'adafrech';
$pass = 'ac^CM4L4B1$_';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>