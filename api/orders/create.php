<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order.php';
if(isset($_POST['code'])){
    $code = $_POST['code'];
    $status = $_POST['status'];
    

    $order = findUserByCode($code);
    if($order == null){
        createorder($code, $status, '');
        $response = array(
            'code' => 200,
            'message' => 'create'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'Email exits'
        );
    }

    echo json_encode($response);
}