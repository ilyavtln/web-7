<?php
	session_start();
	$id = $_GET['id'];
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	
	$stmt = $mysqli->prepare("DELETE FROM catalog WHERE id = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	
	header("Location: ../../pages/catalog.php");
	exit;
?>