<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials : true ");
header("Content-Type: application/json; charset=UTF-8");


require_once 'db_config.php';

$conn = new mysqli($server_name, $user_name, $password , $database);

session_set_cookie_params(86400);
ini_set('session.gc_maxlifetime', 86400);
 