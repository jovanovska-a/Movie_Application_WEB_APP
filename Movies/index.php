<?php
    require("../Model/database.php");
    require("../Model/movies_db.php");

    if(isset($_POST["action"])){
        $action = $_POST["action"];
    }else if(isset($_GET["action"])){
        $action = $_GET["action"];
    }else{
        $action = "list_movies";
    }

    if($action == "list_movies"){
        $movies = getAllMovies();
        include("ShowMovies.php");
    }


?>