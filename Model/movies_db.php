<?php 

    function getAllMovies() {
        global $db;
        $query = 'SELECT movies.*, creativedirectors.*
                FROM movies
                JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
                ORDER BY movies.MovieID';
        $result = $db->query($query);
        return $result;
    }


?>