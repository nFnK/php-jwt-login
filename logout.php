<?php
require_once 'config.php';

unset($_COOKIE["token"]);
setcookie("token", "", time()-3600);

header("Location: index.php");
