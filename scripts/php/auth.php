<?php
session_start();

$login = htmlspecialchars(filter_var(trim($_POST['login'])));
$password = htmlspecialchars(filter_var(trim($_POST['password'])));

$_SESSION['error1'] = "";

$password = md5($password . "fjsrshzfdk4664");

$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');

$stmt = $mysqli->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
$stmt->bind_param("ss", $login, $password);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    $_SESSION['error1'] = "Пользователь не найден. Пожалуйста, зарегистрируйтесь";
    header("Location: ../../auth/authorization.php");
    exit();
}

setcookie('user', $user['name'], time() + 7200, "/");

if ($user['login'] == 'admin') {
    $_SESSION['admin_access'] = true;
}

$stmt->close();
$mysqli->close();

header("Location: ../../index.php");
exit();
?>
