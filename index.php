<?php

session_start();
//Check if the user is authenticated
//If not, send them to login.php
$authenticated = $_SESSION['authenticated'] ?? 0;

if ($authenticated != 1) {
    header('location: /login.php');
}

require_once('user.php');
$user = new User();
$user_list = $user->get_all_users();
echo "<pre>";
print_r($user_list);
    

?>
<!DOCTYPE html>
<html>
<head>
    <title>Deepasree</title>
</head>
<body>

    <h1>Assignment 1</h1>
    <p>Welcome, <?=$_SESSION['username']?></p>


</body>
    <footer> <a href="/logout.php">Click here to log out </a></footer>
</html>