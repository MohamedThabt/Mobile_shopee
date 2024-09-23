
<!-- header (html header , nav1 , nav2) -->
<?php 
include "view/partial/header.php";




  
//  check if wish list  empty or not  
if(count($product->getData('wishlist'))){

    include "view/wish_list.view.php";
    
   }else{
     include "view/empty.wish_list.php" ;
   }