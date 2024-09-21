<?php

// Class to fetch product data
class Product {

    public $db = null;

    // Constructor to inject DBController dependency
    public function __construct(DBController $db) {
        // Check if the database connection is valid and assign it to the class property
        if ($db->conn != null) {
            $this->db = $db->conn; // Assign the PDO connection to $this->db
        } else {
            echo "No database connection";
        }
    }

    // Fetch products 
    public function getData($table = 'product') {
        // Use $this->db directly since it's already the PDO object
        $stmt = $this->db->query("SELECT * FROM {$table}");
        
        // Fetch all results as an associative array
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultArray;
    }
    // get product with item_id
    public function getProduct($item_id=null, $table ='product'){
        if(isset($item_id)){
            $stmt = $this->db->query("SELECT * FROM {$table} WHERE item_id ={$item_id}");
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultArray;
        }
    }
}
