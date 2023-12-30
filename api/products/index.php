<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_product.php';
$productList = getProduct();
echo json_encode($productList);