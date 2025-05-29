<?php

    session_start();

    $failedAttempts = $_SESSION['failed_attempts'] ?? 0;
    $messageFailAttempts = "</br>";
    if ($failedAttempts >= 1) {
      $messageFailAttempts = "<p>This is unsuccessful attempt number " . $_SESSION['failed_attempts']."</p>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login Form</h1>
    <?php echo $messageFailAttempts;?>
    <form action="/validate.php" method="post">
      <label for="username">Username:</label>
        <br>
      <input type="text" id="username" name="username" >
        <br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" >
        <br>
        <br>
      <input type="submit" value="Submit">
    </form>

    <br>

    <form action="signup.php" method="get">
        <input type="submit" value="Create Account">
    </form>

</body>
</html>