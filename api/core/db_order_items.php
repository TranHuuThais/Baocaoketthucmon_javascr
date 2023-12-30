<?php
require_once 'mysql.php';
$pdo = get_pdo();

function createOrder_items($quantily, $price, $products_id, $orders_id )
{
    global $pdo;
    $sql = "INSERT INTO ORDER_ITEMS (quantily, price, products_id, orders_id ) VALUES (:quantily, :price, :products_id, :orders_id )";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':quantily', $quantily);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':products_id', $products_id);
    $stmt->bindParam(':orders_id', $orders_id);

    $stmt->execute();
}


function updateOrder_items($quantily, $price, $products_id, $orders_id, )
{
    global $pdo;
    $sql = "UPDATE ORDER_ITEMS SET quantily=:quantily, price=:price, products_id=:products_id, orders_id=:orders_id WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->bindParam('quantily', $quantily);
    $stmt->bindParam('price', $price);
    $stmt->bindParam('products_id', $products_id);
    $stmt->bindParam('orders_id', $orders_id);

    $stmt->execute();
}

function dateleOrder_items($id)
{
    $sql = "DELETE FROM ORDER_ITEMS WHERE ID=:id ";
    global $pdo;

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('id', $id);
    $stmt->execute();
}


function getOrder_items(){
    global $pdo;
    $sql = "SELECT * FROM ORDER_ITEMS ";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    return $result;
}


function findOrder_items($order_itemId){
    global $pdo;

    $sql = "SELECT * FROM ORDER_ITEMS  WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $order_itemId);
    // thuc hien truy van
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'quantily' => $row['quantily'],
            'price' => $row['price'],
            'products_id' => $row['products_id'],
            'orders_id' => $row['orders_id']
           
        );
    }

    return null;
}


function findOrder_itemsByOrders_id($orders_id){
    global $pdo;

    $sql = "SELECT * FROM ORDER_ITEMS WHERE orders_id=:orders_id " ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("orders_id", $orders_id);
    // thuc hien truy van

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'quantily' => $row['quantily'],
            'price' => $row['price'],
            'products_id' => $row['products_id'],
            'orders_id' => $row['orders_id']
        );
    }

    return null;
}