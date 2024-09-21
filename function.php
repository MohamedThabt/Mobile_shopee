<?php 
//  sql connection 
require "database/DBController.php"; 
require "database/Product.php"; 
require "database/Cart.php"; 


$db = new DBController(); 
$product = new Product($db);
// this code will work also in all_product  and new_product
$product_shuffle = $product->getData();

// Create an instance of the Cart class, passing the DBController instance
$Cart = new Cart($db);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
   if (isset($_POST['submit_add_to_cart'])){
       // call method addToCart
       $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
   }
}; 