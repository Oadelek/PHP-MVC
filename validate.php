<?php

session_start();

$valid_username = "mike";
$valid_password = "password";

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;

$password = $_REQUEST['password'];

if ($username == $valid_username && $password == $valid_password) {
  $_SESSION['authenticated'] = true;
  $_SESSION['failed_attempts'] = 0; // Reset failed attempts
    header('location: /');
} else {
  if (!isset($_SESSION['failed_attempts'])) {
      $_SESSION['failed_attempts'] = 1;
  } else {
      $_SESSION['failed_attempts']++;
  }

  echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];
  
}


?>