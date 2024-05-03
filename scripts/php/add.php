<?php
session_start();

$mysqli = new mysqli("localhost", "root", "root", "web7-bd");

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_POST['image'];
$price = $_POST['price'];

$stmt = $mysqli->prepare("INSERT INTO catalog (id, title, description, image, price) VALUES (NULL, ?, ?, ?, ?)");

$stmt->bind_param("ssss", $title, $description, $image, $price);

$stmt->execute();

$stmt->close();

header("Location: ../../index.php");

?>