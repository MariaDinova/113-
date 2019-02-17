<?php
include_once URI."/adds/model/model.php";

if (isset($_POST["add"], $_POST["text"], $_POST["price"])) {

    $text = $_POST["text"];
    $price = $_POST["price"];
    $user_id = $_SESSION["user"]["user_id"];
    $image_uri = null;
    $tmp_name = $_FILES["image"]["tmp_name"];

    if (is_uploaded_file($tmp_name)) {

        $file_name = time().".jpg";

        if (move_uploaded_file($tmp_name, URI.'/'.UPLOADED."/$file_name")){
            $image_uri = "$file_name";
        }
    }

    if (addOffer($text, $price, $image_uri, $user_id)) {
        header("Location: ".$_GLOBALS['BASE_PATH']."?page=adds&action=dashboard");
    }
    else {
        echo "Offer is not added";
    }
}

include_once URI."/adds/view/add.php";