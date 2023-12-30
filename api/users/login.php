<?php
// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');

// require_once '../core/db_user.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Validate and sanitize input if necessary

//     // Perform the login check
//     $user = findUserByEmailAndPassword($email, $password);

//     if ($user != null) {
//         $response = array(
//             'code' => 200,
//             'message' => 'Đăng nhập thành công',
//             'data' => array(
//                 'user' => $user,
//                 'name' => $user['name'],
//             ),
//         );
//     } else {
//         $response = array(
//             'code' => 600,
//             'message' => 'Đăng nhập thất bại. Email hoặc mật khẩu không hợp lệ'
//         );
//     }

//     echo json_encode($response);
// }

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../core/db_user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize input if necessary

    // Perform the login check
    $user = findUserByEmailAndPassword($email, $password);

    if ($user != null) {
        $response = array(
            'code' => 200,
            'message' => 'Đăng nhập thành công',
            'data' => array(
                'user' => array(
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'name' => $user['name'],
                    // Add any other fields you want to include
                ),
            ),
        );
    } else {
        $response = array(
            'code' => 600,
            'message' => 'Đăng nhập thất bại. Email hoặc mật khẩu không hợp lệ'
        );
    }

    echo json_encode($response);
}
