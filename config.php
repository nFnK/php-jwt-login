<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'library/database.php';

$config['db']['host'] = "host";
$config['db']['username']  = "username";
$config['db']['password'] = "password";
$config['db']['database'] = "database";

$config['jwt']['key'] = 'supersecrettoken';
