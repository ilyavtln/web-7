<?php
	session_start();
	$userAddress = $_GET['type'];
	$id = $_GET['id'];
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	$stmt = $mysqli->prepare("SELECT price FROM catalog WHERE id = ?");
	$stmt->bind_param("i", $id);
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
	
	$today = date("Y-m-d");
	$userLogin = $row['login'];
	
	if ($user_points >= $price) {
		$new_user_points = $user_points - $price;
		$stmt = $mysqli->prepare("UPDATE users SET points = ? WHERE id = ?");
		$stmt->bind_param("ii", $new_user_points, $user_id);
		$stmt->execute();
		
		$stmt = $mysqli->prepare("INSERT INTO cart (id, catalog_id, date, address, login) VALUES (NULL, ?, ?, ?, ?)");
		$stmt->bind_param("isss", $id, $today, $userAddress, $userLogin);
		$stmt->execute();
		$stmt->close();
		
		header("Location: ../../pages/cart.php");
		exit;
	} else {
		echo "Недостаточно средств";
	}

?>