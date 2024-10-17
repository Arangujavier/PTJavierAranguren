<?php
header('Content-Type: application/json');

require_once 'ConnectionApi.php';
require_once 'Movie.php';
require_once 'DataBaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $connection = new ConnectionAPI('731e41f');
    $movies = $connection->searchMovieByName('Star Wars');
    $movies_list = array();
    $bbdd = new DataBaseConnection();
    $bbdd->connectDatabase();
    foreach($movies as $movie){
        $json = $connection->getMovieJson($movie);
        $actualMovie = Movie::fromJson($json);
        try{
            $bbdd->addMovie($actualMovie);
        }
        catch(Exception $e){
            //echo $e->getMessage();
        }
    }
    $moviesBBDD = $bbdd->getMovies();
    $moviesArray = [];
    foreach($moviesBBDD as $movieBBDD){
        $moviesArray[] = [
            'id' => $movieBBDD->getId(),
            'title' => $movieBBDD->getTitle(),
            'year' => $movieBBDD->getYear(),
            'plot' => $movieBBDD->getPlot(),
        ];
    }
    echo json_encode($moviesArray);
}