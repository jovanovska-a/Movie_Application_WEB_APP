<?php
    require("../Model/database.php");
    require("../Model/movies_db.php");
    require("../Model/creative_directors_db.php");
    require("../Model/actors_db.php");
    require("../Model/genres_db.php");
    require("../Model/cart_db.php");
    require("../Model/account_db.php");

    if(isset($_POST["action"])){
        $action = $_POST["action"];
    }else if(isset($_GET["action"])){
        $action = $_GET["action"];
    }else{
        $action = "list_movies";
    }

    if($action == "list_movies"){

        if(isset($_GET["search"])){
            $movies = get_movies_by_search($_GET["search"]);
            $genres = get_genres();
            $search = $_GET["search"];
        }else if(isset($_GET["searchByGenreId"]) && $_GET["searchByGenreId"] != 0){
            $movies = get_movies_by_genre($_GET["searchByGenreId"]);
            $genres = get_genres();
            $chosen = $_GET["searchByGenreId"];
            $search = "";
        }
        else{
            $movies = getAllMovies();
            $genres = get_genres();
            $search = "";
        }

        if(isset($_SESSION["UserID"])){
            $user_movies = get_user_movies($_SESSION["UserID"]);
        }

        include("ShowMovies.php"); 

    } else if($action == "details"){

        $id = $_GET['id'];
        $details = getAllMovieDetailsById($id);
        $actors = get_actors_by_movie($id);
        $genres = get_genres_by_movie($id);
        include("Details.php"); 

    } else if($action == "delete")
    {
        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            header("Location: ../errors/unauthorized.php");
            exit();
        }
        
        $id = $_POST['movie_id'];
        if(file_exists($_POST["ImageUrl"])){
            unlink($_POST["ImageUrl"]);
        }
        delete_movie($id);
        header("Location: ./");
        exit();

    } else if($action == "show_add_form"){

        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            header("Location: ../errors/unauthorized.php");
            exit();
        }

        $genres = get_genres();
        $actors = get_allActors();
        $creative_directors = get_creative_directors();
        include('AddMovie.php');

    } else if($action == "add_movie"){

        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            header("Location: ../errors/unauthorized.php");
            exit();
        }

        $selectedGenres = $_POST['genre_ids'];
        $selectedActors = $_POST['actor_ids'];
        $creative_director = $_POST['director_id'];
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $date = $_POST['publication_date'];
        $url = $_POST['ImageUrl'];

        if (empty($selectedGenres) || empty($selectedActors) || empty($creative_director) || empty($title) || empty($duration) || empty($description) || empty($price) || empty($date) || empty($url)) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            add_movie($selectedGenres, $selectedActors, $creative_director, $title, $duration, $description, $price, $date, $url);
            header("Location: .");
        }

    } else if($action == "show_edit_form"){
        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            header("Location: ../errors/unauthorized.php");
            exit();
        }

        $id = $_GET['id'];
        $movie = getAllMovieDetailsById($id);
        $genres = get_genres();
        $movie_genres = get_genres_by_movie($id);
        $actors = get_allActors();
        $movie_actors = get_actors_by_movie($id);
        $creative_directors = get_creative_directors();
        include("EditMovie.php");

    } else if($action == "edit_movie"){

        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            header("Location: ../errors/unauthorized.php");
            exit();
        }

        $id = $_POST['id'];
        $selectedGenres = $_POST['genre_ids'];
        $selectedActors = $_POST['actor_ids'];
        $creative_director = $_POST['director_id'];
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $date = $_POST['publication_date'];
        $url = $_POST['ImageUrl'];
        
        if (empty($title) || empty($duration) || empty($description) || empty($price) || empty($date) || empty($url)) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        }
        else
        {
            if($_POST["oldImageUrl"] != $_POST["ImageUrl"]){
                if(file_exists($_POST["oldImageUrl"])){
                    unlink($_POST["oldImageUrl"]);
                }
            }
            edit_movie($id, $selectedGenres, $selectedActors, $creative_director, $title, $duration, $description, $price, $date, $url);
            header("Location: .?action=details&id=$id");
        }

    }else if($action == "add_item_to_cart"){
        add_item_to_cart($_POST["UserID"], $_POST["MovieID"]);
        $_SESSION["added_to_cart"] = "" ;
        header("Location: .");
    }


?>