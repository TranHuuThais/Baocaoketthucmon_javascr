<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order_items.php';
$order_itemsList = getOrder_items();
echo json_encode($order_itemsList);