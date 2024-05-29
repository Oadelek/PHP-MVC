<?php
session_start();

require_once 'user.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $user->create_user($username, $password);
    if ($result === "User created successfully") {
        header('Location: login.php?success=' . urlencode('Registration successful. You can now login.'));
        exit();
    } else {
        $error = $result;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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

        .register-container {
          background-color: #ffffff;
          border-radius: 5px;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          padding: 30px;
          width: 400px;
          text-align: center;
        }

        h1 {
          color: #333333;
          margin-bottom: 20px;
        }

        .error-message {
          color: #ff0000;
          margin-bottom: 10px;
          font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #cccccc;
          border-radius: 3px;
          box-sizing: border-box;
        }

        input[type="submit"] {
          background-color: #4CAF50;
          color: #ffffff;
          padding: 10px 20px;
          border: none;
          border-radius: 3px;
          cursor: pointer;
        }

        input[type="submit"]:hover {
          background-color: #45a049;
        }

        p {
          margin-top: 20px;
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
    <div class="register-container">
        <h1>Register</h1>
        <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>