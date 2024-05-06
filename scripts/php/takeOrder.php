<?php
	session_start();
	$id = $_GET['id'];
	$catalog_id = $_GET['catalog_id'];
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	
	$stmt = $mysqli->prepare("UPDATE cart SET received = ? WHERE id = ?");
	$taked = 1;
	$stmt->bind_param("ii", $taked, $id);
	$stmt->execute();
	$stmt->close();
	header("Location: ../../pages/cart.php");
	exit;
?>