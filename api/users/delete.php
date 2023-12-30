<?php 
header('Access-Control-Allow-Origin: *');
require_once '../core/db_user.php';
if(isset($_GET["userId"])){
    $userId = $_GET['userId'];
    deleteUser($userId);
    echo json_encode(array(
        'code'=> 200,
        'massage' =>'succes'
    ));
}

?>