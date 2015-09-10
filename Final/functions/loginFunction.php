<?php
/*
 * users
 * user_id
 * email
 * password
 */
function isValidUser($email, $password) {
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    //$password = sha1($password);
    $binds = array(
        ":email" => $email,
        ":password" => $password
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function createUser($email, $password){
    $db = getDatabase();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password");
    $binds = array(
        ":email" => $email,
        ":password" => $password
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
}

