<?php 

require("../Model/database.php");
require("../Model/cart_db.php");
require("../Model/account_db.php");


if(isset($_POST["action"])){
    $action = $_POST["action"];
}else if(isset($_GET["action"])){ 
    $action = $_GET["action"];
}else{
    $action = "cart";
}

if($action == "cart"){
    if(isset($_SESSION["UserID"])){
        $items = get_user_cart($_SESSION["UserID"]);
    }
    include("Cart.php");
}

if($action == "add-item"){
    add_item_to_cart($_POST["UserID"], $_POST["MovieID"]);
    header("Location: .");
}

if($action == "remove_item"){
    remove_item_from_cart($_POST["ID"]);
    header("Location: .");
}

if($action == "buy_movies"){
    if(!isset($_SESSION["UserID"])){
        $error = "You are not logged in";
        include("../errors/error.php");   
    }

    $items = get_user_cart($_SESSION["UserID"]);
    foreach($items as $item){
        add_user_movie($_SESSION["UserID"], $item["MovieID"]);
        remove_item_from_cart($item["ID"]);
    }
    header("Location: ../Account");
    exit;
}

?>