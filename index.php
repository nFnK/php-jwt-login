<?php
require_once 'config.php';

$action = $_GET['action'];

if($action == 'login') {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, '');
  curl_setopt($ch, CURLOPT_RETURNTTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, array());

  $response = curl_exec();
  $error = curl_error();

  curl_close($ch);
}
