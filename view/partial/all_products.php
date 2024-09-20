<?php
 $product_shuffle = $product->getData();

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
                <a href="<?php printf('%s?item_id=%s', 'view/product.view.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" class="card-img-top"
                        alt="iPhone 13"></a> 
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $item['item_name'] ?? 'Product Name'; ?>
                        </h5>
                        <p class="card-text">Latest Apple flagship with A15 </p>
                        <p class="card-price">$
                            <?php echo $item['item_price'] ?? '0.00'; ?>
                        </p>
                        <a href="#" class="btn btn-add-to-cart">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>