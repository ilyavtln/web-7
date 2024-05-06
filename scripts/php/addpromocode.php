<?php
session_start();

$mysqli = new mysqli("localhost", "root", "root", "web7-bd");

$type = $_POST['type'];
$_SESSION['error4'] = "";

$check_stmt = $mysqli->prepare("SELECT * FROM promocodes WHERE type = ?");
$check_stmt->bind_param("s", $type);
$check_stmt->execute();
$check_result = $check_stmt->get_result();
$promocode = $check_result->fetch_assoc();

if (!$promocode) {
    $_SESSION['error4'] = "Данного промокода не существует";
    header("Location: ../../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $mysqli->prepare("DELETE FROM promocodes WHERE type = ?");
$stmt->bind_param("s", $type);
$stmt->execute();

$update_stmt = $mysqli->prepare("UPDATE users SET points = points + ? WHERE id = ?");
$update_stmt->bind_param("ii", $promocode['price'], $user_id);
$update_stmt->execute();
$update_stmt->close();

$check_stmt->close();
$mysqli->close();

header("Location: ../../index.php");
exit();
?>