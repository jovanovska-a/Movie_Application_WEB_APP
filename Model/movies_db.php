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
    
    function getAllMovieDetailsById($movieId) {
        global $db;
        $query = "SELECT movies.*, 
                creativedirectors.FullName AS DirectorName
            FROM movies
            JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
            WHERE movies.MovieID = '$movieId'
            GROUP BY movies.MovieID, creativedirectors.FullName
            ORDER BY movies.MovieID";
        $result = $db->query($query);
        $details = $result->fetch();
        return $details;
    }
    // function getAllMovieDetailsById($movieId) {
    //     global $db;
    //     $query = "SELECT movies.*, 
    //             creativedirectors.FullName AS DirectorName
    //         FROM movies
    //         JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
            
    //         ORDER BY movies.MovieID";
    //     $result = $db->query($query);
    //     return $result;
    // }

    function delete_movie($movie_id){
        global $db;
        $query = "DELETE FROM movies
                    WHERE MovieID = '$movie_id'";
        $db->exec($query);
    }
    
?>