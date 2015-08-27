<?php

//categories
//category_id
//category


function createCategory($value) {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("INSERT INTO categories SET category = :category");
    $binds = array(
        ":category" => $value);
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
}

function isValidCategory($value) {
    if (empty($value)) {
        return false;
    }

    if (preg_match("/^[a-zA-Z]+$/", $value) == false) {
        return false;
    }

    return true;
}

function getAllCategories() {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM categories");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

function deleteCategory($value) {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("DELETE FROM categories WHERE category_id = :category_id");
    $binds = array(
                ":category_id" => $value);
    if ($stmt->execute($binds)) {
        return true;
    }
    else {
        return false;
    }
}

function UpdateCategory($value, $value2) {
    include_once '../../functions/dbConn.php';
    $db = getDatabase();
    $stmt = $db->prepare("UPDATE categories SET category = :category WHERE category_id = :category_id");
    $binds = array(
        ":category_id" => $value,
        ":category" => $value2 );
    if ($stmt->execute($binds)) {
        return true;
    }
    else {
        return false;
    }
                   
}
