<?php
require_once 'mysql.php';
$pdo = get_pdo();

function createCategory($name, $image)
{
    global $pdo;
    $sql = "INSERT INTO categories (name, image) VALUES (:name, :image)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $image);

    $stmt->execute();
}


function updateCategory($id, $name, $image)
{
    global $pdo;
    $sql = "UPDATE categories SET name=:name, image=:image WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $image);
   

    $stmt->execute();
}


function deleteCategory($id)
{
    $sql = "DELETE FROM categories WHERE ID=:id ";
    global $pdo;
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

function getCategory(){
    global $pdo;
    $sql = "SELECT * FROM categories ";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    return $result;
}



function findCategory($categoryId){
    global $pdo;

    $sql = "SELECT * FROM categories  WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $categoryId);
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
            'image' => $row['image']
           
           
        );
    }

    return null;
}

function findCategoryByName($Name){
    global $pdo;

    $sql = "SELECT * FROM categories WHERE name=:name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("name", $name);
    // thuc hien truy van

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'name' => $row['email'],
            'image' => $row['password']
        );
    }

    return null;
}

