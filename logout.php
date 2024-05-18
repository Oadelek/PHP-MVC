<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Destroy the session and redirect to login page
session_destroy();
header('Location: login.php');
exit();