<?php
  function get_genres() {
      global $db;
      $query = 'SELECT * FROM genres
                ORDER BY GenreID';
      $result = $db->query($query);
      return $result;
  }
  function get_genres_by_movie($movie_id) {
    global $db;
    $query = "SELECT *
              FROM genres
              JOIN movies_genres
              ON genres.GenreID = movies_genres.GenreID
              WHERE movies_genres.MovieID = '$movie_id'";
    $result = $db->query($query);
    return $result;
  }
?> 