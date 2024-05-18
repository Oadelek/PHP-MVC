<?php

$valid_username = "mike";
$valid_password = "password";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username == $valid_username && $password == $valid_password) {
  echo "pass";
} else {
  echo "fail";
}


?>