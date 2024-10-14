<?php
    require_once "ConnectionApi.php";

    // Mostrar la lista de los json de las peliculas
    $connection = new ConnectionAPI("731e41f");
    $movies = $connection->searchMovieByName("Star+Wars");
    foreach($movies as $movie){
        $array = json_decode($connection->getMovieJson($movie), true);
        echo "Name: ". $array["Title"] . ",Year: " . $array["Year"] . "<br>";
    }
?>