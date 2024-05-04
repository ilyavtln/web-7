<?php
	session_start();
	$id = $_GET['id'];
	$catalog_id = $_GET['catalog_id'];
	
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	
	$stmt = $mysqli->prepare("DELETE FROM cart WHERE id = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	
	$stmt = $mysqli->prepare("SELECT price FROM catalog WHERE id = ?");
	$stmt->bind_param("i", $catalog_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$price = $row['price'];
	
	$user_id = $_SESSION['user_id'];
	$stmt = $mysqli->prepare("SELECT points, login FROM users WHERE id = ?");
	$stmt->bind_param("i", $user_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$user_points = $row['points'];
	
	$new_user_points = $user_points + $price;
	$stmt = $mysqli->prepare("UPDATE users SET points = ? WHERE id = ?");
	$stmt->bind_param("ii", $new_user_points, $user_id);
	$stmt->execute();
	$stmt->close();
	
	header("Location: ../../pages/cart.php");
	exit;
?>