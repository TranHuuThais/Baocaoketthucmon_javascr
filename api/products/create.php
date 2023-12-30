<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
require_once '../core/db_product.php';
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $view = $_POST['view'];
    
    $user = findProductByName($name);
    if($user == null){
        createProduct($name, $description, $image, $price, $quantity, $view);
        $response = array(
            'code' => 200,
            'message' => 'create'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'name exits'
        );
    }

    echo json_encode($response);
}