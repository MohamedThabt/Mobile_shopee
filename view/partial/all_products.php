<?php
// Create an instance of the Cart class, passing the DBController instance
$Cart = new Cart($db);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['top_sale_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>


<!-- all product -->
<section class="all-products-section">
    <div class="container">
        <h2 class="section-title">All Products</h2>
        <div class="row">
            <?php foreach($product_shuffle as $item) : ?>
            <!-- Product 1 -->
            <div class="col-md-3">
                <div class="card">
                    <!-- fetch product id by get metho -->
                <a href="<?php printf('%s?item_id=%s', 'product.view.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" class="card-img-top"
                        alt="iPhone 13"></a> 
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $item['item_name'] ?? 'Product Name'; ?>
                        </h5>
                        <p class="card-text">Latest Apple flagship with A15 </p>
                        <p class="card-price">$
                            <?php echo $item['item_price'] ?? '0.00'; ?>
                        </p>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">
                                <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>