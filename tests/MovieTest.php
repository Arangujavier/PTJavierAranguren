<?php
    use function PHPUnit\Framework\assertEquals;
    require_once __DIR__ . DIRECTORY_SEPARATOR . '/../Movie.php';

    class MovieTest extends PHPUnit\Framework\TestCase{
        public function testMovie(){
            $json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'resultGetMovieJson.json');
            $movie_actual = Movie::fromJson($json);
            $movie_expected = new Movie('tt0076759', 'Star Wars: Episode IV - A New Hope', '1977', "Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire's world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...");
            assertEquals($movie_expected->getId(),  $movie_actual->getId(), 'Id de la pelicula no coincide');
            assertEquals($movie_expected->getTitle(),  $movie_actual->getTitle(), 'Titulo de la pelicula no coincide');
            assertEquals($movie_expected->getYear(), $movie_actual->getYear(), 'Año de la pelicula no coincide');
            assertEquals($movie_expected->getPlot(), $movie_actual->getPlot(), 'Trama de la pelicula no coincide');
        }
    }