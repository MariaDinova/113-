<?php

$GLOBALS["PDO"] = new PDO("mysql:host=127.0.0.1:3306;dbname=".SQL_DB,SQL_USERNAME, SQL_PASSWORD);

function getUserPassword($username){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->execute(array($username));
    if($stmt->rowCount() == 0){
        return null;
    }
    else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

function getUserInfo($name){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("SELECT user_id, username FROM users WHERE username=?");
    $stmt->execute(array($name));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function usernameFree($username){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username = ?");
    $stmt->execute(array($username));
    if($stmt->rowCount() == 0){
        return true;
    }
    else {
        return false;
    }
}

function createUser($username, $password){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("INSERT INTO users(username, password) VALUES (?,?)");
    $stmt->execute(array($username,$password));
    if($stmt->rowCount() == 0){
        return false;
    }
    else {
        return true;
    }
}

