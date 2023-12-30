<?php
require_once 'mysql.php';
$pdo = get_pdo();

function createUser($name ,$email, $password, $role)
{
    global $pdo;
    $sql = "INSERT INTO USERS (NAME ,EMAIL, PASSWORD, ROLE) VALUES (:name, :email, :password, :role )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    $stmt->execute();
}


function updateUser($id, $name, $email, $password, $role)
{
    global $pdo;
    $sql = "UPDATE USERS SET  name=:name, email=:email, PASSWORD=:password, ROLE=:role WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->bindParam('name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    $stmt->execute();
}


function deleteUser($id)
{
    $sql = "DELETE FROM USERS WHERE ID=:id ";
    global $pdo;
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

function getUser(){
    global $pdo;
    $sql = "SELECT * FROM USERS ";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    return $result;
}



function findUser($userId){
    global $pdo;

    $sql = "SELECT * FROM USERS  WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $userId);
    // thuc hien truy van
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role']
           
        );
    }

    return null;
}


function findUserByEmail($email){
    global $pdo;

    $sql = "SELECT * FROM USERS WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("email", $email);
    // thuc hien truy van

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role']
        );
    }

    return null;
}

function findUserByEmailAndPassword($email, $password) {
    global $pdo;

    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);  // Thêm dấu hai chấm trước "email"
    $stmt->bindParam(":password", $password);  // Thêm dấu hai chấm trước "password"

    $stmt->execute();

    // Sử dụng fetch để nhận một hàng duy nhất
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return array(
            'id' => $result['id'],
            'name' => $result['name'],
            'email' => $result['email'],
            'password' => $result['password'],
            'role' => $result['role']
        );
    }

    return null;
}

