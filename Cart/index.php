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

if($action == "remove_item"){
    remove_item_from_cart($_POST["ID"]);
    header("Location: .");
}

if($action == "buy_movies"){
    if(!isset($_SESSION["UserID"])){
        $error = "You are not logged in";
        include("../errors/error.php");   
    }
    //$user_email = get_user_email($_SESSION["UserID"]);
    $items = get_user_cart($_SESSION["UserID"]);
    //$total_price = 0;
    foreach($items as $item){
        add_user_movie($_SESSION["UserID"], $item["MovieID"]);
        remove_item_from_cart($item["ID"]);
       // $total_price += $item["Price"]; 
    }
    //$to = $user_email;
    $to = 'anastasijajovanovska25@gmail.com';
    $subject = 'Order Confirmation';
    $message = "Thank you for your purchase! \n\nWe hope you enjoy your movies!";
    $headers = 'From: no-reply@yourdomain.com' . "\r\n" .
               'Reply-To: no-reply@yourdomain.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    if (mail($to, $subject, $message, $headers)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email.';
    }
    //header("Location: ../Account");
    exit;
}



?>