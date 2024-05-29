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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .welcome-container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome, <?php echo $username; ?></h1>
        <p>Today is: <?php echo $currentDate; ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html> 