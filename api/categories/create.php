<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
require_once '../core/db_category.php';
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $image = $_POST['image'];
    $user = findCategoryByName($name);
    if($user == null){
        createCategory($name, $image);
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