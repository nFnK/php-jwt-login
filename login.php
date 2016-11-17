<?php
require_once 'config.php';
use \Firebase\JWT\JWT;
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) && empty($password)) {
  header("Location: index.php");
}

$database = new Database(
  $config['db']['host'],
  $config['db']['username'],
  $config['db']['password'],
  $config['db']['database']
);

$database->select(['id', 'username', 'name'])
         ->from('users')
         ->where('username =', $username)
         ->where('password = ', $password)
         ->limit(1);
$user = $database->fetchOne();
if($database->numRows() == 1) {

  $payload = array(
      "iss" => "http://localhost:8080",
      "aud" => "http://localhost:8080",
      "iat" => time(),
      "nbf" => time(),
      "exp" => time()+3600,
      "user_id" => $user->id,
      "username" => $user->username,
      "name" => $user->name
  );

  $jwt = JWT::encode($payload, $config['jwt']['key']);
  setcookie("token", $jwt, time()+3600);

  header("Location: secure.php");
} else {
  header("Location: index.php?msg=failed");
}
