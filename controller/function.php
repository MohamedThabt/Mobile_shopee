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

//============================================
//           cart operations                ||
// ===========================================

// add to cart
if($_SERVER['REQUEST_METHOD'] == "POST"){
   if (isset($_POST['submit_add_to_cart'])){
       // call method addToCart
       $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
   }
}; 
// add cart from wish list
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['add_to_cart_from_wish_list'])){
        // call method add to wish list
        $Cart->addToCartFromWishList($_POST['item_id']);
    }}

// delete from cart
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['delete_cart_item'])){
        // call method addToCart
       $deletItem=  $Cart->deleteCart($_POST['item_id']);
    }}

    

//============================================
//           wish list operations           ||
// ===========================================
    // add to wish list
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['add_to_wish_list'])){
        // call method add to wish list
        $Cart->addToWishList($_POST['item_id']);
    }}

    // delete from wish list
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['delete_wish_list_item'])){
        // call method addToCart
        $deletItem=  $Cart->deleteWishListItem($_POST['item_id']);
    }}