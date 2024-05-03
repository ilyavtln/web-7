<?php
// session_start();

// $mysqli = new mysqli("localhost", "root", "root", "web7-bd");

// $_SESSION['success'] = "";

// $check_stmt = $mysqli->prepare("SELECT * FROM catalog WHERE id = ?");
// $check_stmt->bind_param("s", $id);
// $check_stmt->execute();
// $check_result = $check_stmt->get_result();
// $order = $check_result->fetch_assoc();

// if ($order) {
//     $_SESSION['success'] = "Заказ успешно оформлен";
    
//     $user_id = $_SESSION['user_id'];

// $update_stmt = $mysqli->prepare("UPDATE users SET points = points - ? WHERE id = ?");
// $update_stmt->bind_param("ii", $catalog['price'], $user_id);
// $update_stmt->execute();
// $update_stmt->close();

// $check_stmt->close();
// $mysqli->close();

// header("Location: ../../auth/cabinet.php");
// exit();

// }


// session_start();

// $mysqli = new mysqli("localhost", "root", "root", "web7-bd");

// $_SESSION['success'] = "";

// $id = $_GET['id'];

// $check_stmt = $mysqli->prepare("SELECT * FROM catalog WHERE title = ?");
// $check_stmt->bind_param("s", $title);
// $check_stmt->execute();
// $check_result = $check_stmt->get_result();
// $order = $check_result->fetch_assoc();

// if ($order) {
//     $_SESSION['success'] = "Заказ успешно оформлен";
    
//     $user_id = $_SESSION['user_id'];
//     $price = $order['price'];

//     $update_stmt = $mysqli->prepare("UPDATE users SET points = points - ? WHERE id = ?");
//     $update_stmt->bind_param("ii", $price, $user_id);
//     $update_stmt->execute();
//     $update_stmt->close();

//     $check_stmt->close();
//     $mysqli->close();

//     header("Location: ../../auth/cabinet.php");
//     exit();

// }
// header("Location: ../../auth/cabinet.php");

  session_start();
  $id = $_GET['id'];
  $mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
  $stmt = $mysqli->prepare("SELECT price FROM catalog WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $price = $row['price'];

  $user_id = $_SESSION['user_id'];
  $stmt = $mysqli->prepare("SELECT points FROM users WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $user_points = $row['points'];

  if ($user_points >= $price) {
    $new_user_points = $user_points - $price;
    $stmt = $mysqli->prepare("UPDATE users SET points = ? WHERE id = ?");
    $stmt->bind_param("ii", $new_user_points, $user_id);
    $stmt->execute();

    header("Location: ../../auth/cabinet.php");
    exit;
  } else {
    echo "Недостаточно средств";
  }

?>