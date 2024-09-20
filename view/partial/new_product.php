<?php
$product_shuffle = $product->getData(); // Fetch product data
?>

<section class="new-products-section">
    <div class="container">
        <h2 class="section-title">New Arrivals</h2>
        <div class="row">
            <?php
            // Loop through the first 4 products in the array
            $counter = 0;
            foreach ($product_shuffle as $item):
                if ($counter < 4): // Only display the first 4 products
            ?>
            <!-- Product Card -->
            <div class="col-md-3">
                <div class="card">
                    <a href="<?php printf('%s?item_id=%s', 'product.view.php', $item['item_id']); ?>"><img
                            src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" class="card-img-top"
                            alt="Product Image"></a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $item['item_name'] ?? 'Product Name'; ?>
                        </h5>
                        <p class="card-text">Latest tech with amazing features.</p>
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
                    <span class="badge-new">New</span>
                </div>
            </div>
            <?php
                endif;
                $counter++;
            endforeach;
            ?>
        </div>
    </div>
</section>