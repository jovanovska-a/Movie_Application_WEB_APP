<?php 

require("../Model/database.php");
require("../Model/cart_db.php");
require("../Model/account_db.php");
require '/Users/anastasijajovanovska/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $user_email = get_user_email($_SESSION["UserID"]);
    $username = get_user_username($_SESSION["UserID"]);
    $items = get_user_cart($_SESSION["UserID"]);
    $total_price = 0;
    foreach($items as $item){
        add_user_movie($_SESSION["UserID"], $item["MovieID"]);
        remove_item_from_cart($item["ID"]);
        $total_price += $item["Price"]; 
    }
    $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'my.movies.application25@gmail.com';
            $mail->Password = 'gbwl ioue cfsp zjbo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('mymovies@gmail.com', 'MyMovies');
            $mail->addAddress($user_email, $username);
            $mail->isHTML(true);        
            $mail->Subject = 'Order Confirmation';
            $mail->Body    = "Thank you for your purchase of \${$total_price}!\n\nWe hope you enjoy your movies!";
            $mail->AltBody = "Thank you for your purchase!\n\nWe hope you enjoy your movies!";
            $mail->send();
            header("Location: ../Account");
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    exit;
}
?>