<?php 

    function get_user_cart($UserIDencoded){
        global $db;
        $userID = base64_decode($UserIDencoded);
        $query = "SELECT cart.ID, movies.* FROM cart
                  JOIN movies ON movies.MovieID = cart.MovieID
                  WHERE cart.UserID = '$userID'
                  ORDER BY cart.ID";

        $result = $db->query($query);
        return $result;
    }

    function add_item_to_cart($UserIDencoded, $MovieID){
        global $db;
        $userID = base64_decode($UserIDencoded);
        $query = "INSERT INTO cart (UserID, MovieID)
                  VALUES ('$userID', '$MovieID')";
        $db->exec($query);
    }

    function remove_item_from_cart($ID){
        global $db;
        $query = "DELETE FROM cart
                  WHERE ID=$ID";
        $db->exec($query);
    }

?>