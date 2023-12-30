<?php
require_once 'mysql.php';
$pdo = get_pdo();

function find_product($productId){
    global $pdo;

    $sql = "SELECT * FROM products WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $productId);

    // thực hiện truy vấn
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return null;
}

function get_products_by_category($category_id){
    global $pdo;

    $sql = "SELECT * FROM products WHERE CATEGORY_ID=:category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("category_id", $category_id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}

function get_all_products(){
    global $pdo;

    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}

function get_hot_products(){
    global $pdo;

    $sql = "SELECT * FROM products WHERE VIEW > 50 ORDER BY VIEW DESC LIMIT 50";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}


function get_new_products(){
    global $pdo;

    $sql = "SELECT * FROM products ORDER BY day(create_at) DESC LIMIT 6";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}

function find_product_by_name($key){
    global $pdo;

    $sql = "SELECT * FROM products  WHERE NAME LIKE '%$key%'";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}
function getProduct(){
    global $pdo;
    $sql = "SELECT * FROM products ";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    return $result;
}


function findProductByName($Name){
    global $pdo;

    $sql = "SELECT * FROM products WHERE name=:name";
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
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return null;
}



function createProduct($name, $description, $image, $price, $quantity, $view)
{
    global $pdo;
    $sql = "INSERT INTO products (name, description, image, price, quantity, view) VALUES (:name, :description, :image, :price, :quantity, :view)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':view', $view);

    $stmt->execute();
}

function deleteProduct($id)
{
    $sql = "DELETE FROM products WHERE ID=:id ";
    global $pdo;
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
}
function updateProduct($id, $name, $description, $image, $price, $quantity, $view)
{
    global $pdo;
    $sql = "UPDATE products SET name=:name, description=:description, image=:image, price=:price, quantity=:quantity, view=:view  WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('id', $id);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':view', $view);
   

    $stmt->execute();
}

?>

