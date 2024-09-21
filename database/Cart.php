<?php


class Cart{

        public $db = null;
    
        // Constructor
        public function __construct(DBController $db) {
            if (!isset($db->conn)) return null;
            $this->db = $db;
        }
        public function insertIntoCart($params = null, $table = "cart")
        {
            // Ensure the database connection is available
            if ($this->db->conn != null) {
                if ($params != null) {
                    // Get table columns (e.g., user_id, item_id)
                    $columns = implode(',', array_keys($params));
    
                    // Create placeholders for values (e.g., :user_id, :item_id)
                    $placeholders = implode(',', array_map(function($key) {
                        return ':' . $key;
                    }, array_keys($params)));
    
                    // Create SQL query
                    $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $placeholders);
    
                    try {
                        // Prepare the SQL statement
                        $stmt = $this->db->conn->prepare($query_string);
    
                        // Execute the statement with bound parameters
                        $result = $stmt->execute($params);
    
                        // Return true if the query was successful
                        return $result;
                    } catch (PDOException $e) {
                        // Log the error
                        error_log("Database Insert Error: " . $e->getMessage());
                        return false;
                    }
                }
            }
            // Return false if no params were passed or if there was no connection
            return false;
        }
        public function addToCart($userid, $itemid){
            if (isset($userid) && isset($itemid)){
                $params = array(
                    "user_id" => $userid,
                    "item_id" => $itemid
                );
                // insert data into cart
                $result = $this->insertIntoCart($params);
                if ($result){
                    // Reload Page
                    header("Location: " . $_SERVER['PHP_SELF']);
                }
                return $result;
            }
            return false;
        }
        // calculate total cart price 
        public function getSum($arr){
            if(isset($arr)){
                $sum = 0;
                foreach($arr as $item){
                    $sum +=floatval($item[0]);
                }
                return sprintf('%.2f',$sum);
            }
        }
    }
    




    
