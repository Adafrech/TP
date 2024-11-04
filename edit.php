<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$image = 'uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $image);

$mysqli->query("UPDATE items SET name='$name', quantity=$quantity, price=$price, image='$image' WHERE id=$id");

header("Location: index.php");
?>