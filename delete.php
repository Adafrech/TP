<?php
include 'db.php';

$id = $_POST['id'];

$mysqli->query("DELETE FROM items WHERE id=$id");

header("Location: index.php");
?>