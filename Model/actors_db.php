<?php
function get_allActors(){
  global $db;
  $query = 'SELECT * FROM actors
            ORDER BY ActorID';
  $result = $db->query($query);
  return $result;
}

function get_actor_by_actorId($actorID){
  global $db;
  $query = "SELECT * FROM actors
            WHERE ActorID = $actorID";
  $result = $db->query($query);
  $actor = $result->fetch();
  return $actor;
}

function get_movies_by_actorId($actorID){
  global $db;
  $query = "SELECT * FROM movies
            JOIN movies_actors ON movies.MovieID = movies_actors.MovieID
            WHERE movies_actors.ActorID = $actorID";
  $result = $db->query($query);
  return $result;
}

function add_actor($FullName, $Biography, $BirthDate, $Nationality, $ActorImageUrl){
  global $db;
  $query = "INSERT INTO actors (FullName, Biography, BirthDate, Nationality, ActorImageUrl)
            VALUES ('$FullName', '$Biography', '$BirthDate', '$Nationality', '$ActorImageUrl')";
  $db->exec($query);
}

function delete_actor($actorID){
  global $db;
  $query = "DELETE FROM actors
            WHERE ActorID = $actorID";
  $db->exec($query);
}

function edit_actor($ActorID, $FullName, $Biography, $BirthDate, $Nationality, $ActorImageUrl){
  global $db;
  $query = "UPDATE actors
            SET FullName = '$FullName', Biography = '$Biography', BirthDate = '$BirthDate', Nationality = '$Nationality', ActorImageUrl = '$ActorImageUrl'
            WHERE ActorID = $ActorID";
  $db->exec($query);
}

function get_actors_by_search($search){
  global $db;
  $query = "SELECT * FROM actors
            WHERE FullName LIKE '%$search%'";
  $result = $db->query($query);
  return $result;
}


  function get_actors_by_movie($movie_id) {
    global $db;
    $query = "SELECT *
              FROM actors
              JOIN movies_actors 
              ON actors.ActorID = movies_actors.ActorID
              WHERE movies_actors.MovieID = '$movie_id'";
    $result = $db->query($query);
    return $result;
  }


?>

