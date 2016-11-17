<?php
require_once 'config.php';
use \Firebase\JWT\JWT;
$jwt = $_COOKIE['token'];

if(empty($jwt)) {
  header("Location: logout.php");
}

$decoded = JWT::decode($jwt, $config['jwt']['key'], array('HS256'));

if(empty($decoded->username)) {
  header("Location: logout.php");
}

$database = new Database(
  $config['db']['host'],
  $config['db']['username'],
  $config['db']['password'],
  $config['db']['database']
);

$database->select('id')
         ->from('users')
         ->where('id =', $decoded->user_id)
         ->limit(1);
$user = $database->fetchOne();
if($database->numRows() == 0) {
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
