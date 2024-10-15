<?php
    require_once 'ConnectionApi.php';
    require_once 'Movie.php';
    require_once 'BBDD.php';

    // Mostrar la lista de los json de las peliculas
    $connection = new ConnectionAPI('731e41f');
    $movies = $connection->searchMovieByName('Star Wars');
    echo json_encode($movies);
    $movies_list = array();
    $bbdd = BBDD::getInstance();
    $bbdd_connection = $bbdd->getConnection();
    foreach($movies as $movie){
        $json = $connection->getMovieJson($movie);
        $actualMovie = Movie::fromJson($json);
        echo '<h4>Titulo: ' . $actualMovie->getTitle() . '</h4>';
        echo 'Id: ' . $actualMovie->getId() . '<br>';
        echo 'Año: ' . $actualMovie->getYear() . '<br>';
        echo 'Trama: ' . $actualMovie->getPlot() . '<br>';
        echo '<br>';
        $query = "insert into movie (Id, Year, Plot, Title) values ('" . $bbdd_connection->real_escape_string($actualMovie->getId()) . "', " . $actualMovie->getYear() . ", '" . $bbdd_connection->real_escape_string($actualMovie->getPlot()) . "','" . $bbdd_connection->real_escape_string($actualMovie->getTitle()) . "')";
        echo "Consulta: " . $query . "<br>";

        $result = $bbdd_connection->query($query);
        echo 'Resultado: ' .  $result . '<br>';
    }