<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order_items.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $user = findOrder_items($id);
    if($user != null){
        $quantily = $_POST['quantily'];
        $price = $_POST['price'];
        $products_id = $_POST['products_id'];
        $orders_id = $_POST['orders_id'];
        updateOrder_items($id, $quantily, $price, $products_id, $orders_id);
        $response = array(
            'code' => 200,
            'message' => 'update success'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'order not found'
        );
    }

    echo json_encode($response);
}