<?php
// At the very top of your PHP file (before any output)
ob_start();

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





    // add to cart
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



    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        try {
            $query = "DELETE FROM {$table} WHERE item_id = :item_id";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $result = $stmt->execute();
    
            if ($result) {
                // Instead of immediate redirection, set a flag or session variable
                $_SESSION['redirect'] = $_SERVER['PHP_SELF'];
                return true; // Indicate successful deletion
            }
    
            return $result;
        } catch (PDOException $e) {
            error_log("Failed to delete cart item: " . $e->getMessage());
            return false;
        }}

    
     // get item_it of shopping cart list
     public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }



// add to wish list from cart
  public function addToWishList($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
    if ($item_id != null) {
        try {
            // Start transaction
            $this->db->conn->beginTransaction();

            // Insert item into wishlist
            $insertQuery = "INSERT INTO {$saveTable} (SELECT * FROM {$fromTable} WHERE item_id = :item_id)";
            $stmt = $this->db->conn->prepare($insertQuery);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();

            // Delete item from cart
            $deleteQuery = "DELETE FROM {$fromTable} WHERE item_id = :item_id";
            $stmt = $this->db->conn->prepare($deleteQuery);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->db->conn->commit();
        } catch (PDOException $e) {
            // Roll back the transaction if something failed
            $this->db->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    return false;
}
// add to wish list from cart
  public function addToCartFromWishList($item_id = null, $saveTable = "cart", $fromTable = "wishlist"){
    if ($item_id != null) {
        try {
            // Start transaction
            $this->db->conn->beginTransaction();

            // Insert item into wishlist
            $insertQuery = "INSERT INTO {$saveTable} (SELECT * FROM {$fromTable} WHERE item_id = :item_id)";
            $stmt = $this->db->conn->prepare($insertQuery);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();

            // Delete item from cart
            $deleteQuery = "DELETE FROM {$fromTable} WHERE item_id = :item_id";
            $stmt = $this->db->conn->prepare($deleteQuery);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();

            // Commit transaction
            $this->db->conn->commit();
        } catch (PDOException $e) {
            // Roll back the transaction if something failed
            $this->db->conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    return false;
}


    // delete wish list item 
    public function deleteWishListItem($item_id = null, $table = 'wishlist'){
        try {
            $query = "DELETE FROM {$table} WHERE item_id = :item_id";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
            $result = $stmt->execute();
    
            if ($result) {
                // Instead of immediate redirection, set a flag or session variable
                $_SESSION['redirect'] = $_SERVER['PHP_SELF'];
                return true; // Indicate successful deletion
            }
    
            return $result;
        } catch (PDOException $e) {
            error_log("Failed to delete cart item: " . $e->getMessage());
            return false;
        }}

    
    
    }
    
    // At the end of your script or in a suitable location
    if (isset($_SESSION['redirect'])) {
        $redirect_url = $_SESSION['redirect'];
        unset($_SESSION['redirect']);
        ob_end_clean(); // Clear the output buffer
        header("Location: " . $redirect_url);
        exit();
    }
    
    // If no redirect is needed, flush the output buffer
    ob_end_flush();
    



    




    
