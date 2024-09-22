<!-- header (html header , nav1 , nav2) -->
<?php include"view/partial/header.php";?>


<!-- check if cart empty or not  -->
<?php count($product->getData('cart'))? include"view/cart.view.php" : include"view/empty.cart.view.php" ?>