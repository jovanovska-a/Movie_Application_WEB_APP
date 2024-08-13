<?php 
require("../Model/database.php");
require("../Model/actors_db.php");

if(isset($_POST["action"])){
    $action = $_POST["action"];
}else if(isset($_GET["action"])){
    $action = $_GET["action"];
}else{
    $action = "list_actors";
}

if($action == "list_actors"){
    if(isset($_GET["search"])){
        $actors = get_actors_by_search($_GET["search"]);
        $search = $_GET["search"];
    }else{
        $actors = get_allActors();
        $search = "";
    }
    include("ShowActors.php");
}

if($action == "details"){
    $actor = get_actor_by_actorId($_GET["actorID"]);
    $movies = get_movies_by_actorId($_GET["actorID"]);
    include("Details.php");
}

if($action == "show_add_form"){
    include("AddActor.php");
}

if($action == "add_actor"){
    if(empty($_POST["FullName"]) || empty($_POST["Biography"]) || empty($_POST["BirthDate"]) || empty($_POST["Nationality"]) || empty($_POST["ImageUrl"])){
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
        die();
    }
    add_actor($_POST["FullName"], $_POST["Biography"], $_POST["BirthDate"], $_POST["Nationality"], $_POST["ImageUrl"]);
    header("Location: .");
}

if($action == "delete_actor"){
    if(file_exists($_POST["ImageUrl"])){
        unlink($_POST["ImageUrl"]);
    }
    delete_actor($_POST["actorID"]);
    header("Location: .");
}

if($action == "show_edit_form"){
    $actor = get_actor_by_actorId($_GET["actorID"]);
    include("EditActor.php");
}

if($action == "edit_actor"){
    if(empty($_POST["actorID"]) || empty($_POST["FullName"]) || empty($_POST["Biography"]) || empty($_POST["BirthDate"]) || empty($_POST["Nationality"]) || empty($_POST["ImageUrl"])){
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
        die();
    }

    if($_POST["oldImageUrl"] != $_POST["ImageUrl"]){
        if(file_exists($_POST["oldImageUrl"])){
            unlink($_POST["oldImageUrl"]);
        }
    }

    edit_actor($_POST["actorID"], $_POST["FullName"], $_POST["Biography"], $_POST["BirthDate"], $_POST["Nationality"], $_POST["ImageUrl"]);
    $actorID = $_POST["actorID"];
    header("Location: .?action=details&actorID=$actorID");
}

?>