<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order.php';
$orderList = getOrder();
echo json_encode($orderList);