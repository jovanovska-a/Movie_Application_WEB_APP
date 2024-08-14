<?php 

    function getAllMovies() {
        global $db;
        $query = 'SELECT movies.*, creativedirectors.FullName AS DirectorName
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

    function delete_movie($movie_id)
    {
        global $db;
        $query = "DELETE FROM movies
                    WHERE MovieID = '$movie_id'";
        $db->exec($query);

        $query = "DELETE FROM movies_actors WHERE MovieID = '$movie_id'";
        $db->exec($query);
        
        $query = "DELETE FROM movies_genres WHERE MovieID = '$movie_id'";
        $db->exec($query);
    }

    function add_movie($selectedGenres, $selectedActors, $creative_director, $title, $duration, $description, $price, $date, $url)
    {
        global $db;
        $query = " INSERT INTO movies (Title, PublicationDate, Description, Duration, MovieImageUrl, Price, CreativeDirectorID)
                  VALUES ('$title', '$date', '$description', '$duration', '$url', '$price', '$creative_director')
        ";
        $db->exec($query);
        $movie_id = $db->lastInsertId();

        foreach ($selectedGenres as $genre_id) {
            $query = "INSERT INTO movies_genres (MovieID, GenreID) VALUES ('$movie_id', '$genre_id')";
            $db->exec($query);
        }

        foreach ($selectedActors as $actor_id) {
            $query = "INSERT INTO movies_actors (MovieID, ActorID) VALUES ('$movie_id', '$actor_id')";
            $db->exec($query);
        }
    }

    function edit_movie($id, $selectedGenres, $selectedActors, $creative_director, $title, $duration, $description, $price, $date, $url){
        global $db;
        $query = "UPDATE movies
                    SET Title = '$title', Description = '$description', PublicationDate = '$date', Duration = '$duration', MovieImageUrl = '$url', Price = '$price', CreativeDirectorID = '$creative_director'
                    WHERE MovieID = $id";
        $db->exec($query);
        if(!empty($selectedGenres))
        {
            $deleteQuery = "DELETE FROM movies_genres WHERE MovieID = $id";
            $db->exec($deleteQuery);
            foreach ($selectedGenres as $genre_id) {
                $insertQuery = "INSERT INTO movies_genres (MovieID, GenreID) VALUES ($id, $genre_id)";
                $db->exec($insertQuery);
            }
        }
        if(!empty($selectedActors))
        {
            $deleteQuery = "DELETE FROM movies_actors WHERE MovieID = $id";
            $db->exec($deleteQuery);
            foreach ($selectedActors as $actor_id) {
                $insertQuery = "INSERT INTO movies_actors (MovieID, ActorID) VALUES ('$id', '$actor_id')";
                $db->exec($insertQuery);
            }
        } 
    }

    function get_movies_by_search($search)
    {
        global $db;
        $query =
                  "SELECT movies.*, 
                creativedirectors.FullName AS DirectorName
            FROM movies
            JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
            WHERE movies.Title LIKE '%$search%'
            GROUP BY movies.MovieID, creativedirectors.FullName
            ORDER BY movies.MovieID";
        $result = $db->query($query);
        return $result;
    }

    function get_movies_by_genre($genreID){
        global $db;
        $query = "SELECT movies.*, creativedirectors.FullName AS DirectorName FROM movies
                  JOIN  movies_genres ON movies.MovieID = movies_genres.MovieID
                  JOIN creativedirectors ON movies.CreativeDirectorID = creativedirectors.CreativeDirectorID
                  WHERE movies_genres.GenreID = $genreID
                  ORDER BY movies.MovieID";
        $result = $db->query($query);
        return $result;
    }
?>