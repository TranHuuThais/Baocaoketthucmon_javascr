<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_user.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $user = findUser($id);
    if($user != null){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        updateUser($id, $name, $email, $password, $role);
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