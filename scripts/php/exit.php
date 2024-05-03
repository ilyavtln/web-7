<?php
  global $user;
  session_start();
  $_SESSION = [];
  setcookie('user', $user['name'], time() - 7200, "/");
  session_destroy();
  header('Location: ../../index.php');
  exit();
?>