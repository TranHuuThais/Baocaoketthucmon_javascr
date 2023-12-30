<?php 
header('Access-Control-Allow-Origin: *');
require_once '../core/db_product.php';
if(isset($_GET["ProductID"])){
    $ProductID = $_GET['ProductID'];
    deleteProduct($ProductID);
    echo json_encode(array(
        'code'=> 200,
        'massage' =>'succes'
    ));
}

?>