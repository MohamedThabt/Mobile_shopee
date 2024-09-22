
<!-- header (html header , nav1 , nav2) -->
<?php include"view/partial/header.php";?>





<!-- check if wish list  empty or not  -->
<?php count($product->getData('cart'))? include"view/wish_list.php" : include"view/empty.wish_list.php" ?>