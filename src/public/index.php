<?php
require_once __DIR__."/../app/header.php";

$page = isset($_GET['page']) ? $_GET['page'] : "home";

switch($page){
    case "catalog":
        include __DIR__."/../app/Catalog.php";
        break;
    case "cart":
        include __DIR__."/../app/Cart.php";
        break;
    default:
        include __DIR__."/../app/Home.php";
        break;
}

require_once __DIR__."/../app/footer.php";
