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
    $password = sha1($password);
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
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
    $password = sha1($password);
    $binds = array(
        ":email" => $email,
        ":password" => $password
    );
    $stmt->execute($binds);
    
    if (empty($binds)) {
        return false;
    }
    return true;
}

function isValidPassword($password) {
    if (strlen($password) < 4) {
        return false;
    }
    return true;
}

