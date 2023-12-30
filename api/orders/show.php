<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $order = findOrder($id);
    if($order != null){
        $response = array(
            'code' => 200,
            'message' => 'delete success',
            'data' => $order
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'order not found'
        );
    }

    echo json_encode($response);
}