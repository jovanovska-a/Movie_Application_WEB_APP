<?php
    require("../Model/database.php");
    require("../Model/movies_db.php");
    require("../Model/creative_directors_db.php");
    require("../Model/actors_db.php");
    require("../Model/genres_db.php");

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
    } else if($action == "details"){
        $id = $_GET['id'];
        $details = getAllMovieDetailsById($id);
        $actors = get_actors_by_movie($id);
        $genres = get_genres_by_movie($id);
        $director_name = get_director_name($id);
        include("Details.php"); 
    } else if($action == "delete")
    {
        $id = $_POST['movie_id'];
        delete_movie($id);
        header("Location: ./");
        exit();
    } else if($action == "show_add_form"){
        $genres = get_genres();
        $actors = get_allActors();
        $creative_directors = get_creative_directors();
        include('AddMovie.php');
    } else if($action == "add"){
        if (isset($_POST['genre_ids'])) {
            $selectedGenres = $_POST['genre_ids'];
        }
        if (isset($_POST['actor_ids'])) {
            $selectedActors = $_POST['actor_ids'];
        }
        if (isset($_POST['director_id'])) {
            $creative_director = $_POST['director_id'];
        }
        $code = $_POST['code'];
    }
?>