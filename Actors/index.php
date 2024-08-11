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
    $actors = getAllActors();
    include("ListActors.php");
}

if($action == "details"){
    $actor = getActorById($_GET["actorID"]);
    var_dump($actor);
    include("ActorDetails.php");
}


?>