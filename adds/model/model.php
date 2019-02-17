<?php

$GLOBALS["PDO"] = new PDO("mysql:host=127.0.0.1:3306;dbname=".SQL_DB,SQL_USERNAME, SQL_PASSWORD);


function getAllOffers($page,$sort){
    /** @var PDO $pdo */
    $ofcet = 5;
    $query = "SELECT offer_id, offer_text, price, image_uri, user_id FROM offers";



    if($sort == "asc"){
        $query.= " ORDER BY price ";
    }
    else if($sort == "desc"){
        $query.= " ORDER BY price DESC ";
    }
    $query.= " LIMIT " . ($page-1)*$ofcet ." , $ofcet";
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $offers = [];
    foreach ($rows as $row){
        $offers[] = $row;
    }
    return $offers;
}

function countOffers(){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("SELECT COUNT(offer_id) as countOf FROM offers");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getOffer($offer_id){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("SELECT offer_text, price, image_uri FROM offers WHERE offer_id=?");
    $stmt->execute(array($offer_id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function edit($text,$price,$image_uri,$offer_id){
    /** @var PDO $pdo */

    $pdo = $GLOBALS["PDO"];

    if($image_uri != NULL) {
        $stmt = $pdo->prepare("UPDATE offers SET offer_text=?, price=?, image_uri=? WHERE offer_id=? AND user_id=?");
        $stmt->execute(array($text,$price,$image_uri, $offer_id,$_SESSION["user"]["user_id"]));
    }
    else{
        $stmt = $pdo->prepare("UPDATE offers SET offer_text=?, price=? WHERE offer_id=? AND user_id=?");
        $stmt->execute(array($text,$price, $offer_id,$_SESSION["user"]["user_id"]));
    }

    if($stmt->rowCount() == 0){
        return false;
    }
    else {
        return true;
    }
}

function delete($offer_id){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("DELETE FROM offers WHERE offer_id =? AND user_id=? LIMIT 1");
    $stmt->execute(array($offer_id,$_SESSION["user"]["user_id"]));
    if($stmt->rowCount() == 0){
        return false;
    }
    else {
        return true;
    }
}

function addOffer($text,$price,$image_uri, $user_id){
    /** @var PDO $pdo */
    $pdo = $GLOBALS["PDO"];
    $stmt = $pdo->prepare("INSERT INTO offers(offer_text, price, user_id, image_uri) VALUES (?,?,?,?)");
    $stmt->execute(array($text,$price,$user_id,$image_uri));
    if($stmt->rowCount() == 0){
        return false;
    }
    else {
        return true;
    }
}
