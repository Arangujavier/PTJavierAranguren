<?php
    /**
     * 
     * ConnectionAPI: Permite realizar operaciones con la API omdbapi, que permite obtener información de peliculas
     * Es necesario proporcionar una apiKey
     */
    class ConnectionAPI{
        private $url = "https://www.omdbapi.com/"; // Ruta de API
        private $apiKey;

        public function __construct($apiKey){
            // Iniciar variables correspondientes
            $this->apiKey = $apiKey;
        }

        /**
         * searchMovieByName: A partir de un nombre se obtiene una lista de ids de las peliculas con el mismo nombre.
         * @param mixed $name Nombre de la pelicula a identificar.
         * @return array Conjunto de ids que tienen el mismo nombre.
         */
        public function searchMovieByName($name){
            // Obtener array peliculas
            $query = $this->url . '?apikey=' . $this->apiKey . '&s=' . urlencode($name);

            // Obtener json
            $json = file_get_contents($query, true);

            // Tratar json
            $movies = json_decode($json, true)['Search'];
            
            // Lista ids
            $ids = array();
            foreach($movies as $movie){
                $ids[] = $movie['imdbID'];
            }
            return $ids;
        }

        /**
         * getMovieJson:  Obtiene la información de una película a partir de su id.
         * @param string $id Id de la pelicula
         * @return string Información de la pelicula
         */
        public function getMovieJson($id){
            // Obtener json correspondientes
            $query = $this->url . '?apikey=' . $this->apiKey . '&i=' . urlencode($id);
            return file_get_contents($query, true);
        }
    }
