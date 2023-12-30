<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_category.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $Category = findCategory($id);
    if($Category != null){
        $name = $_POST['name'];
        $image = $_POST['image'];
        
        updateCategory($id, $name, $image);
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