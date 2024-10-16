<?php
    /**
     * Movie: Objeto que almacena los datos de las peliculas.
     * Se pueden proporcionar los datos para su creacion.
     * Se puede usar un json para su creacion.
     */
    class movie{
        private $id;
        private $title;
        private $year;
        private $plot; // Trama de la pelicula

        // Constructores
        public function __construct($id, $title, $year, $plot){
            $this->setId($id);
            $this->setTitle($title);
            $this->setYear($year);
            $this->setPlot($plot);
        }

        public static function fromJson($json){
            $jsonDecode = json_decode($json, true);
            return new self($jsonDecode['imdbID'],  $jsonDecode['Title'], $jsonDecode['Year'], $jsonDecode['Plot']);
        }

        // Getters y Setters
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getTitle(){
            return $this->title;
        }
        
        public function setTitle($title){
            $this->title = $title;
        }
        
        public function getYear(){
            return $this->year;
        }
        
        public function setYear($year){
            $this->year = $year;
        }
        
        public function getPlot(){
            return $this->plot;
        }
        
        public function setPlot($plot){
            $this->plot = $plot;
        }
    }