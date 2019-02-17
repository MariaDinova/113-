<?php

include_once URI."/adds/model/model.php";
$id = $_GET["id"];

if (isset($_POST["edit"],$_POST["text"],$_POST["price"])){
    $text = $_POST["text"];
    $price = $_POST["price"];
    $user_id=$_SESSION["user"]["user_id"];

    $image_uri = null;
    $tmp_name = $_FILES["image"]["tmp_name"];
    if(is_uploaded_file($tmp_name)){
        $file_name = time().".jpg";
        if(move_uploaded_file($tmp_name, URI."/".UPLOADED.$file_name)){
            $image_uri = "$file_name";
        }
    }

    if (edit($text,$price,$image_uri,$id)){
        header("Location: ".$_GLOBALS['BASE_PATH']."?page=adds&action=dashboard");
    }
    else{
        echo "Is not edited";
    }
}

$offerInfo = getOffer($id);

include(URI."/adds/view/edit.php");