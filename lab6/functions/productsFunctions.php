<?php
//products
//product_id
//category_id
//product
//price
//image



function createProduct($category_id, $product, $price, $image) {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image");
    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image);
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
}

function isValidProduct($value) {
    if (empty($value)) {
        return false;
    }
    return true;
}

function isValidPrice($value) {
    if (empty($value)) {
        return false;
    }
    return true;
}

function deleteProduct($value) {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("DELETE FROM products WHERE product_id = :product_id");
    $binds = array(
                ":product_id" => $value);
    if ($stmt->execute($binds)) {
        return true;
    }
    else {
        return false;
    }
}

function getAllProducts() {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM products");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

