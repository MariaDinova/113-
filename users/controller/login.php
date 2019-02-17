<?php

include_once (URI .'/users/model/model.php');

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = getUserPassword($username);
    $real_pass = $result["password"];

    if($real_pass == null){
        echo "User does not exist. Please register";
    }
    else{
        if(password_verify(trim($password), $real_pass)){
            $_SESSION["user"] = getUserInfo($username);
            header("Location: ".$_GLOBALS['BASE_PATH']."?page=adds&action=dashboard");
        }
        else{
            echo "Wrong pass!";
        }
    }
}


include(URI .'/users/view/login.php');