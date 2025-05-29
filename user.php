<?php
require_once('database.php');

Class User{
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function create_user($username, $password) {

  if ($this->user_exists($username)) {
    throw new Exception("Username already exists.");
  }

  $db = db_connect();
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
  $statement->bindParam(':username', $username);
  $statement->bindParam(':password', $hashed_password);
  $statement->execute();

  return $db->lastInsertId();
  }

  //Check if a username already exists
  public function user_exists($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();
    $count = $statement->fetchColumn();
    return $count > 0;
  }


}
?>  