<?php
include 'db.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$image = 'uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $image);

$mysqli->query("INSERT INTO items (name, quantity, price, image) VALUES ('$name', $quantity, $price, '$image')");

header("Location: index.php");
?>