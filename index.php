<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>JWT Login</title>
</head>
<body>
<form action="login.php" method="post">
  <label for="username">Username</label><br>
  <input type="text" name="username" id="username"><br>
  <label for="password">Password</label><br>
  <input type="password" name="password" id="password"><br>
  <input type="submit" name="login" value="Login">
</form>
</body>
</html>
