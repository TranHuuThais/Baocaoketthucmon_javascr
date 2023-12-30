<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order_items.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $order_items = findOrder_items($id);
    if($order_items != null){
        dateleOrder_items($id);
        $response = array(
            'code' => 200,
            'message' => 'delete success'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'order_items not found'
        );
    }

    echo json_encode($response);
}