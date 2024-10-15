<?php

use function PHPUnit\Framework\assertEquals;

    require __DIR__ . DIRECTORY_SEPARATOR . '/../Movie.php';

    class MovieTest extends PHPUnit\Framework\TestCase{
        public function testMovie(){
            $json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'resultGetMovieJson.json');
            $movieObtained = Movie::fromJson($json);
            $movieObjetive = new Movie('tt0076759', 'Star Wars: Episode IV - A New Hope', '1977', "Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire's world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...");
            assertEquals($movieObtained->getId(),  $movieObjetive->getId());
            assertEquals($movieObtained->getTitle(),  $movieObjetive->getTitle());
            assertEquals($movieObtained->getYear(), $movieObjetive->getYear());
            assertEquals($movieObtained->getPlot(), $movieObjetive->getPlot());
        }
    }
?>