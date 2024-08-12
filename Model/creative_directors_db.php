<?php
    function get_creative_directors() {
        global $db;
        $query = 'SELECT * FROM creativedirectors
                ORDER BY CreativeDirectorID';
        $result = $db->query($query);
        return $result;
    }

    function get_director_name($creative_director_id) {
        global $db;
        $query = "SELECT * FROM creativedirectors
                WHERE CreativeDirectorID = $creative_director_id";
        $director = $db->query($query);
        $director = $director->fetch();
        $director_name = $director['FullName'];
        return $director_name;
    }

    function get_creative_directors_by_search($search){
        global $db;
        $query = "SELECT * FROM creativedirectors
                WHERE FullName LIKE '%$search%'";
        $result = $db->query($query);
        return $result;
    }

    function get_director_by_directorId($id){
        global $db;
        $query = "SELECT * FROM creativedirectors
                  WHERE CreativeDirectorID = '$id'";
        $result = $db->query($query);
        $director = $result->fetch();
        return $director;
    }

    function get_movies_by_directorId($id){
        global $db;
        $query = "SELECT * FROM movies
                WHERE movies.CreativeDirectorID = $id";
        $result = $db->query($query);
        return $result;
    }

    function add_director($FullName, $Biography, $BirthDate, $Nationality, $DirectorImageUrl){
        global $db;
        $query = "INSERT INTO creativedirectors (FullName, Biography, BirthDate, Nationality,  DirectorImageUrl)
                  VALUES ('$FullName', '$Biography', '$BirthDate', '$Nationality', '$DirectorImageUrl')";
        $db->exec($query);
    }

    function delete_director($id){
        global $db;
        $query = "DELETE FROM creativedirectors
                  WHERE CreativeDirectorID = $id";
        $db->exec($query);
    }

    function edit_director($DirectorID, $FullName, $Biography, $BirthDate, $Nationality, $DirectorImageUrl){
        global $db;
        $query = "UPDATE creativedirectors
                  SET FullName = '$FullName', Biography = '$Biography', BirthDate = '$BirthDate', Nationality = '$Nationality', DirectorImageUrl = '$DirectorImageUrl'
                  WHERE CreativeDirectorID = $DirectorID";
        $db->exec($query);
      }

?>