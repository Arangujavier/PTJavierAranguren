<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/Movie.php'; 
    use Doctrine\DBAL\DriverManager;

    class DataBaseConnection{
        private $connectionParams = [
            'path' => __DIR__ . '/movies.db',
            'driver' => 'pdo_sqlite',
        ];
        private $connection;
    
        public function __construct(){
        }

        /**
         * connectDatabase: Conecta con la base de datos y crea la tabla si es necesario
         */
        function connectDatabase(){
            $this->connection = DriverManager::getConnection($this->connectionParams);
            $table = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'BBDD.sql');
            $this->connection->executeStatement($table);
        }
    
        function addMovie($movie){
            $this->connection->insert('movie', [
                'Id' => $movie->getId(),
                'Year' => $movie->getYear(),
                'Plot' => $movie->getPlot(),
                'Title' => $movie->getTitle(),
            ]);
        }

        function getMovies(){
            $query = 'SELECT * FROM movie';
            $result = $this->connection->executeQuery($query);
            $movies = $result->fetchAll(PDO::FETCH_ASSOC);
            $movie_array = array();
            foreach ($movies as $movie) {
                $movie_array[] = new Movie($movie['Id'], $movie['Title'], $movie['year'], $movie['plot']);
            }
            return $movie_array;
        }
    }
    