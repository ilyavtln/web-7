<?php
	session_start();
	$code = $_GET['code'];
	$coast = $_GET['coast'];
	
	$code = strval($code);
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	
	$stmt = $mysqli->prepare("INSERT INTO promocodes (type, price) VALUES (?, ?)");
	$stmt->bind_param("si", $code, $coast);
	$stmt->execute();
	$stmt->close();
	
	
	header("Location: ../../index.php");
	exit;
?>