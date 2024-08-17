<?php 
require("../Model/database.php");
require("../Model/account_db.php");


if(isset($_POST["action"])){
    $action = $_POST["action"];
}else if(isset($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "my_movies";
}

if($action == "my_movies"){
    if(isset($_SESSION["UserID"])){
        $userMovies = get_user_movies($_SESSION["UserID"]);
    }
    include("MyMovies.php");
}

if($action == "login-form"){
    include("Login.php");   
}

if($action == "login"){
    if(empty($_POST["EmailAddress"]) || empty($_POST["Password"])){
        $_SESSION["error"] = "All fields are required!!";
        header("Location: ./?action=login-form");
        exit();
    }
    $user = get_user($_POST["EmailAddress"]);

    if(!$user){
        $_SESSION["error"] = "Wrong email address!!";
        header("Location: ./?action=login-form");
        exit();
    }

    if(!password_verify($_POST["Password"], $user["Password"])){
        $_SESSION["error"] = "Wrong password!!";
        header("Location: ./?action=login-form");
        exit();
    }

    $_SESSION["logged_in"] = "true";
    $_SESSION["success"] = "You have logged in";
    $_SESSION["Role"] = $user["Role"];
    $encodedID = base64_encode($user["UserID"]);
    $_SESSION["UserID"] = $encodedID;

    if(isset($_SESSION["current_page"])){
        $previous_page = $_SESSION["current_page"];
        unset($SESSION["current_page"]);
        header("Location: $previous_page");
        exit();
    }
    header("Location: .");
}

if($action == "register-form"){
    include("Register.php");
}

if($action == "register"){

    if(empty($_POST["Username"]) || empty($_POST["EmailAddress"]) || empty($_POST["Password"]) || empty($_POST["ConfirmPassword"])){
        $_SESSION["error"] = "All fields are required!!";
        header("Location: ./?action=register-form");
        exit();
    }

    if(strcmp($_POST["Password"], $_POST["ConfirmPassword"]) != 0){
        $_SESSION["error"] = "Passwords don't match!!";
        header("Location: ./?action=register-form");
        exit();
    }

    $user = get_user($_POST["EmailAddress"]);

    if($user){
        $_SESSION["error"] = "Email exists!!";
        header("Location: ./?action=register-form");
        exit();
    }
    
    $password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

    register_user($_POST["Username"], $_POST["EmailAddress"], $password_hash , "user");
    header("Location: ./Login.php");
}

if($action == "logout"){
    session_unset();
    session_destroy();
    header("Location: ../Actors");
}