<?php

    function getAllActors(){
        global $db;
        $query = 'SELECT * FROM actors
                  ORDER BY ActorID';
        $result = $db->query($query);
        return $result;
    }

    function getActorById($actorID){
        global $db;
        $query = "SELECT * FROM actors
                  WHERE ActorID = $actorID";
        $result = $db->query($query);
        $actor = $result->fetch();
        return $actor;
    }

?>