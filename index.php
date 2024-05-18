<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// User is logged in
$username = $_SESSION['username'];
$currentDate = date('l, F jS, Y');


?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?></h1>
    <p>Today is: <?php echo $currentDate; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>