<?php

// header('Access-Control-Allow-Origin: *');
// require_once '../core/db_user.php';

// if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
//     $name = $_POST['name'];
    
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $role = $_POST['role'];
    
//     $user = findUserByEmail($email);
//     if($user == null){
//         createUser($name, $email, $password, $role);
//         $response = array(
//             'code' => 200,
//             'message' => 'Account successfully created'
//         );
//     }else{
//         $response = array(
//             'code' => 600,
//             'message' => 'Email already exists'
//         );
//     }

//     echo json_encode($response);
// }

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');;
require_once '../core/db_user.php';

if(isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $user = findUserByEmail($email);
    if($user == null){
        createUser($name,$email, $password, $role);
        $response = array(
            'code' => 200,
            'message' => 'create'
        );
    }else{
        $response = array(
            'code' => 600,
            'message' => 'exists'
        );
    }

    echo json_encode($response);
}


?>