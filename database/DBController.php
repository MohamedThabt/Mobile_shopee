<?php

class DBController {
    // Database connection details
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'mobile_store';

    public $conn = null;

    // Constructor
    public function __construct() {
        try {
            // Establish the database connection
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            // Output the connection failure message
            echo "Connection failed: " . $e->getMessage();
        }
    }

    

    //Destructor to close the connection
    public function __destruct() {
        $this->conn = null;
    }
}

