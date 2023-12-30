<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_product.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $product = find_product($id);
    if($product != null){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $view = $_POST['view'];
        
        updateProduct($id, $name, $description, $image, $price, $quantity, $view);
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