<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order_items.php';
if(isset($_POST['orders_id'])){
    $orders_id = $_POST['orders_id'];
    $quantily = $_POST['quantily'];
    $products_id = $_POST['products_id'];
    $price = $_POST['price'];
   

    $Order_item = findOrder_itemsByOrders_id($orders_id);
    if($Order_item == null){
        createOrder_items($quantily, $price,  $products_id, $orders_id);
        $response = array(
            
            'message' => 'create'
        );
    }else{
        $response = array(
            
            'message' => 'id exits'
        );
    }

    echo json_encode($response);
}