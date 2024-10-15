<?php
class BBDD {
    private static $instance = null;
    private $connection;

    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'pt_tesicnor';

    private function __construct() {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Conexión fallida: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new BBDD();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
