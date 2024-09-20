<!--  sql connection -->
<?php 
require "database/DBController.php"; 
require "database/Product.php"; 
require "database/Cart.php"; 


$db = new DBController(); 
$product = new Product($db);
$product ->getData(table : 'product'); // defult argument is product (you can chang it as {table: cart})n