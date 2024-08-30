<?php

    function register_user($Username, $EmailAddress, $Password, $Role){
        global $db;
        $query = "INSERT INTO users (Username, EmailAddress, Password, Role)
                  VALUES ('$Username', '$EmailAddress', '$Password', '$Role')";
        $db->exec($query);
    }

    function get_user($EmailAddress){
        global $db;
        $query = "SELECT * FROM users
                  WHERE EmailAddress = '$EmailAddress'";

        $result = $db->query($query);
        $user = $result->fetch();
        return $user;
    }

    function get_user_movies($UserIDencrypted){
        global $db;
        $userID = base64_decode($UserIDencrypted);
        $query = "SELECT user_movies.ID, movies.*, creativedirectors.FullName as DirectorName FROM user_movies
                  JOIN movies ON user_movies.MovieID = movies.MovieID
                  JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
                  WHERE user_movies.UserID = '$userID'";

        $result = $db->query($query);
        return $result;
    }

    function get_user_email($UserIDencrypted){
        global $db;
        $userID = base64_decode($UserIDencrypted);
        $query = "SELECT EmailAddress FROM users
                  WHERE users.UserID = '$userID'";
        $result = $db->query($query);
        $user = $result->fetch();
        return $user;
    }

    function add_user_movie($UserIDencrypted, $MovieID){
        global $db;
        $userID = base64_decode(($UserIDencrypted));
        $query = "INSERT INTO user_movies (UserID, MovieID)
                  VALUES ('$userID', '$MovieID')";
        
        $db->exec($query);
    }

?>