<?php
require_once ('database.php');


Class User {
  public function get_all_users () {
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM users");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows; 
  }

  public function get_user_by_username($username){
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->execute();
      $row = $statement->fetch(PDO::FETCH_ASSOC);
      return $row;
  }

  public function create_user($username, $password){
      // Check if the username already exists
      if ($this->get_user_by_username($username)) {
          return "Username already exists";
      }
  
      // Validate password strength
      if (!validate_password($password)) {
          return "Password does not meet the minimum security requirements";
      }
  
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
      $statement->bindParam(':username', $username, PDO::PARAM_STR);
      $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  
      if ($statement->execute()) {
          return "User created successfully";
      } else {
          return "Error creating user";
      }
  }

  
}






?>