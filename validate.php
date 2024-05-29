<?php
session_start();

//$valid_username = "mike";
//$valid_password = "password";
require_once 'database.php';
require_once 'user.php';


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//$_SESSION['username'] = $username;

$user = new User();

// Check if the user exists in the database
$user_data = $user->get_user_by_username($username);

if ($user_data) {
    // Verify the password
    $hashed_password = $user_data['password'];
    if (password_verify($password, $hashed_password)) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['failed_attempts'] = 0; // Reset failed attempts
        header('Location: index.php');
        exit();
    } else {
        // Password is incorrect
        handle_failed_attempt();
        $error = "Incorrect username or password. Please try again.";
        header('Location: login.php?error=' . urlencode($error));
        exit();
    }
} else {
    // User not found
    handle_failed_attempt();
    $error = "Incorrect username or password. Please try again.";
    header('Location: login.php?error=' . urlencode($error));
    exit();
}

function handle_failed_attempt()
{
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts']++;
    }
}
