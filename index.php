<?php
ob_start();


//header (html header , nav1 , nav2) 
//this code causes some problems when put it in the top because it's need ob()
include "view/partial/header.php";



// Home page :
// 1 Banner carousl 
include "view/partial/banner_carsoul.php";
// 2 Top sale  
include "view/partial/top_sale.php";
// 3 new
include "view/partial/new_product.php";
// 4 All products
include "view/partial/all_products.php";







//footer
include "view/partial/footer.php";