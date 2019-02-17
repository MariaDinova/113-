<?php
include_once URI."/adds/model/model.php";
$offers = [];
$p = isset($_GET['p']) ? $_GET['p'] : 1;
$sort=isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$offers = getAllOffers($p, $sort);

$allOffers = countOffers()["countOf"];

require_once URI."/adds/view/dashboard.php";


