<?php
session_start();

$mysqli = new mysqli("localhost", "root", "root", "web7-bd");

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_POST['image'];
$date = $_POST['date'];

$stmt = $mysqli->prepare("INSERT INTO promo (id, title, description, image, date) VALUES (NULL, ?, ?, ?, ?)");

$stmt->bind_param("ssss", $title, $description, $image, $date);

$stmt->execute();

$stmt->close();

header("Location: ../../index.php");

?>