<?php

include_once URI."/adds/model/model.php";

if (isset($_POST["id"])) {
    $offer_id = $_POST["id"];
}
if (delete($offer_id)) {
    $delete["msg"] = "deleted";
}
else {
    $delete["msg"] = " not deleted";
}
echo json_encode($delete);