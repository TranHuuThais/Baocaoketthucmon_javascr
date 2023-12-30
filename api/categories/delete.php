<?php 
header('Access-Control-Allow-Origin: *');
require_once '../core/db_category.php';
if(isset($_GET["categoryId"])){
    $categoryId = $_GET['categoryId'];
    deleteCategory($categoryId);
    echo json_encode(array(
        'code'=> 200,
        'massage' =>'succes'
    ));
}

?>