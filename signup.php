<?php
require_once "user.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $message = "All fields are required.";
    } elseif (strlen($password) < 10) {
        $message = "Password must be at least 10 characters long.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        try {
            $user = new User();
            if ($user->user_exists($username)) {
                $message = "<span style='color:red;'>Account cannot be created. Username already exists.</span>";
            } else {
                $user_id = $user->create_user($username, $password);
                $message = "Account created successfully. Your user ID is $user_id.<br><a href='login.php'>Click here to login</a>";
            }
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Create an Account</h2>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password"><br><br>

        <input type="submit" value="Create Account">
    </form>

    <p><?php echo $message; ?></p>
</body>
</html>
