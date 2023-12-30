<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order_items.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $order_items = findOrder_items($id);
    if($order_items != null){
        $response = array(
            'code' => 200,
            'message' => 'delete success',
            'data' => $order_items
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'Order_items not found'
        );
    }

    echo json_encode($response);
}