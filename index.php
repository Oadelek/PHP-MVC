<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$current_date = date('F j, Y, g:i a');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Current date and time: <?php echo $current_date; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
