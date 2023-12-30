<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_category.php';
$CategoryList = getCategory();
echo json_encode($CategoryList);