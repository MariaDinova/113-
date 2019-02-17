<?php
//CONFIG
const URI = __DIR__; // c:/xampp/...
const UPLOADED = '/images/';
const SQL_USERNAME = "root";
const SQL_PASSWORD = "";
const SQL_DB = "";
//END CONFIG


$_GLOBALS['BASE_PATH'] = explode ('?', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[0];

if(!session_start()){
    session_start();
}

$pages = array();
$pages['page'] = ["users", "adds"];

$action = array();
$action["users"] = ["create", "login", "logout"];
$action["adds"] = ["add", "dashboard", "delete", "edit"];

$publicActions = array();
$publicActions = ["create", "login"];

if (isset($_GET['sort'])){
    if (!($_GET['sort'] == 'asc' || $_GET['sort'] == 'desc')) {
        $_GET['sort'] = 'asc';
    }
}

if (isset($_GET['p'])){
    if ($_GET['p'] != intval($_GET['p'])) {
        $_GET['p'] = 1;
    }
}


if (isset($_GET['page']) && validPage() && havePermission($publicActions)) {

    if (!isset($_GET['action'])) {

        $_GET['action'] = 'index';
    }
    if (validAction($action)){
        include_once (URI.'/'.$_GET['page'].'/controller/'.$_GET['action'].'.php');
    }

}
else {
    if (isset($_SESSION["user"])){
        header("Location: ".$_GLOBALS['BASE_PATH']."?page=adds&action=dashboard") ;
    }
   else {
       include_once (URI.'/public/index.php');
   }

}

function u($str=''){
    return urldecode($str);
}

function h ($str){
    return htmlspecialchars($str);
}

function validPage (){
    if($_GET['page'] == 'users' || $_GET['page'] == 'adds'){
        return true;
    }
    else {
        return false;
    }
}

function validAction($action){
    if(in_array($_GET["action"], $action[$_GET["page"]])){
        return true;
    }
    else {
        return false;
    }
}

function havePermission ($public) {

    if (!isset($_SESSION["user"]) && in_array($_GET["action"], $public)) {
        return true;
    }

    if (isset($_SESSION["user"])) {
        return true;
    }
    return false;
}