<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_user.php';
$userList = getUser();
echo json_encode($userList);