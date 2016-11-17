<?php
require_once 'config.php';
use \Firebase\JWT\JWT;
$jwt = $_COOKIE['token'];

if(empty($jwt)) {
  header("Location: index.php");
}

$decoded = JWT::decode($jwt, secret, array('HS256'));

if(empty($decoded->username)) {
  header("Location: index.php");
}
$array = (array) $decoded;
?>
<!DOCTYPE html>
<html>
<head>
  <title>JWT Login</title>
</head>
<body>
<ul>
  <?php foreach($array as $key => $val) { ?>
    <li><?php echo $key; ?>: <?php echo $val; ?></li>
  <?php } ?>
</ul>
<br>
<a href="logout.php">Logout</a>
</body>
</html>
