<?php

session_start();
require_once "user.php";

$valid_username = "deepasree";
$valid_password = "password";

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$_SESSION["username"] = $username;
$_SESSION["authenticated"] = 0;

$user = new User();
$matchedUser = $user->get_user_by_username($username);

$storedHash = $matchedUser["password"];
/*if (password_verify($password, $storedHash)) {
    echo "Password match with hash password in db";
} else {
    echo "given password did not match with hash password in db";
}*/

if ($matchedUser && password_verify($password, $matchedUser["password"])) {
    $_SESSION["authenticated"] = 1;
    header("location: /");
} else {
    if (!isset($_SESSION["failed_attempts"])) {
        $_SESSION["failed_attempts"] = 1;
    } else {
        $_SESSION["failed_attempts"] += 1;
    }
    //echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];
    header("location: /login.php");
}

?>
