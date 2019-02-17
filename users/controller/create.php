<?php

include_once (URI .'/users/model/model.php');

if (isset($_POST["create"])) {

    if(validateString($_POST["username"]) && validateString($_POST["password"])
        && usernameFree($_POST["username"])){
        $username = $_POST["username"];
        $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

        if(createUser($username, $password)){
            $_SESSION["user"] = getUserInfo($username);

            header("Location: ".$_GLOBALS['BASE_PATH']."?page=adds&action=dashboard");
        }
        else {
            echo "Sorry, try again not create";
        }
    }
    else {
        echo "Sorry, try again";
    }
}

include_once(URI .'/users/view/create.php');

function validateString($var){
    return isset($var) && $var != "";
}
