<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_order.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $order = findOrder($id);
    if($order != null){
        $code = $_POST['code'];
        $status = $_POST['status'];
        $users_id = $_POST['users_id'];
        updateorder($id, $code, $status, $users_id);
        $response = array(
            'code' => 200,
            'message' => 'update success'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'user not found'
        );
    }

    echo json_encode($response);
}