<?php
    // Ejemplo consulta
    // https://www.omdbapi.com/?apikey=731e41f&t=Star+Wars
    /*
    1. Diseñar Test que compruebe la pelicula de Star Wars con la respuesta,
    para ello se crean un archivo de texto(json) con la respuesta esperada
    2. Diseñar Funcion.
    3. Probar Funcion.
    */

    class ConnectionAPI{
        private $url = "https://www.omdbapi.com/";
        private $apiKey;

        public function __construct($apiKey){
            // Iniciar variables correspondientes
            $this->apiKey = $apiKey;
        }

        public function searchMovieByName($name){
            // Obtener array peliculas
            $query = $this->url . '?apikey=' . $this->apiKey . '&s=' . $name;
            $json = file_get_contents($query, true);
            $movies = json_decode($json, true)['Search'];
            $titles = array();
            foreach($movies as $movie){
                $titles[] = $movie['Title'];
            }
            return $titles;
        }

        public function getMovieJson($name){
            // Obtener json correspondientes
            $query = $this->url . '?apikey=' . $this->apiKey . '&t=' . $name;
            return file_get_contents($query, true);
        }
    }

    // Prueba
    $connection = new ConnectionAPI("731e41f");
    $titles = $connection->searchMovieByName("Star+Wars");
    echo json_encode($titles);

    //$json = $connection->getMovieJson("Star+Wars");
    //echo 'Contendino Json:<br>';
    //print_r($json);