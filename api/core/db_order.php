<?php
require_once 'mysql.php';
$pdo = get_pdo();

function createOrder($code, $status, $users_id)
{
    global $pdo;
    $sql = "INSERT INTO ORDERS (code, status, users_id) VALUES (:code, :status, :users_id )";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':users_id', $users_id);

    $stmt->execute();
}


function updateOrder($id, $code, $status, $users_id)
{
    global $pdo;
    $sql = "UPDATE ORDERS SET CODE=:code, STATUS=:status, USERS=:users_id WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id);
    
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':users_id', $users_id);

    $stmt->execute();
}


function deleteOrder($id)
{
    $sql = "DELETE FROM ORDERS WHERE ID=:id ";
    global $pdo;
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

function getOrder(){
    global $pdo;
    $sql = "SELECT * FROM ORDERS ";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    return $result;
}



function findOrder($orderId){
    global $pdo;

    $sql = "SELECT * FROM ORDERS  WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $orderId);
    // thuc hien truy van
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'users_id' => $row['users_id']
           
        );
    }

    return null;
}

function findUserByCode($code){
    global $pdo;

    $sql = "SELECT * FROM ORDERS WHERE code=:code";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("code", $code);
    // thuc hien truy van

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'users_id' => $row['users_id']
        );
    }

    return null;
}

