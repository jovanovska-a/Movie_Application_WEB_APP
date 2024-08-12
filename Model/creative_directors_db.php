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

?>