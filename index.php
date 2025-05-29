<?php

    require_once('user.php');
    $user = new User();
    $users_list = user->get_all_users();
    print_r($users_list) 

?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php echo '<p>Hello World</p>'; ?> 

</html>