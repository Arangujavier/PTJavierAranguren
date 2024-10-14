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

        public function getMovieJson($name){
            // Obtener json correspondientes
            $query = $this->url . '?apikey=' . $this->apiKey . '&t=' . $name;
            return file_get_contents($query, true);
        }
    }

    // Prueba
    //$connection = new ConnectionAPI("731e41f");
    //$json = $connection->getMovieJson("Star+Wars");
    //echo 'Contendino Json:<br>';
    //print_r($json);