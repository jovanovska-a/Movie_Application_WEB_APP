<?php 
    require("../Model/database.php");
    require("../Model/creative_directors_db.php");

    if(isset($_POST["action"])){
        $action = $_POST["action"];
    }else if(isset($_GET["action"])){
        $action = $_GET["action"];
    }else{
        $action = "list_directors";
    }

    if($action == "list_directors"){

        if(isset($_GET["search"])){
            $directors = get_creative_directors_by_search($_GET["search"]);
            $search = $_GET["search"];
        }else{
            $directors = get_creative_directors();
            $search = "";
        }
        include("ShowCreativeDirectors.php");

    } else if($action == "details"){

        $id = $_GET['id'];
        $director = get_director_by_directorId($id);
        $movies = get_movies_by_directorId($id);
        include("Details.php");

    } else if($action == "show_add_form"){

        include("AddCreativeDirector.php");

    } else if($action == "add_director"){

        if(empty($_POST["FullName"]) || empty($_POST["Biography"]) || empty($_POST["BirthDate"]) || empty($_POST["Nationality"]) || empty($_POST["ImageUrl"])){
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
            die();
        }
        add_director($_POST["FullName"], $_POST["Biography"], $_POST["BirthDate"], $_POST["Nationality"], $_POST["ImageUrl"]);
        header("Location: .");

    } else if($action == "delete_director"){

        if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
            $error = "You dont have permision for this page";
            header("Location: ../errors/error.php");
            exit();
        }

        if(file_exists($_POST["ImageUrl"])){
            unlink($_POST["ImageUrl"]);
        }
        delete_director($_POST["id"]);
        header("Location: .");

    } else if($action == "show_edit_form"){

        $director = get_director_by_directorId($_GET["id"]);
        include("EditCreativeDirector.php");

    } else if($action == "edit_director"){

        if(empty($_POST["directorID"]) || empty($_POST["FullName"]) || empty($_POST["Biography"]) || empty($_POST["BirthDate"]) || empty($_POST["Nationality"]) || empty($_POST["ImageUrl"])){
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
            die();
        }

        if($_POST["oldImageUrl"] != $_POST["ImageUrl"]){
            if(file_exists($_POST["oldImageUrl"])){
                unlink($_POST["oldImageUrl"]);
            }
        }

        edit_director($_POST["directorID"], $_POST["FullName"], $_POST["Biography"], $_POST["BirthDate"], $_POST["Nationality"], $_POST["ImageUrl"]);
        $directorID = $_POST["directorID"];
        header("Location: .?action=details&id=$directorID");
    } 
?>