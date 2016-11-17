<?php
require_once 'config.php';
use \Firebase\JWT\JWT;
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) && empty($password)) {
  header("Location: index.php");
}

$token = array(
    "iss" => "http://localhost:8080",
    "aud" => "http://localhost:8080",
    "iat" => 1356999524,
    "nbf" => 1357000000,
    "user_id" => 123,
    "username" => $username
);

$jwt = JWT::encode($token, secret);
setcookie("token", $jwt, time()+3600);

header("Location: secure.php");
