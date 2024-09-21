 <?php
 
?>

<section class="top-sales-section">
    <div class="container">
        <h2 class="section-title">Top Sales</h2>
        <div id="topSalesCarousel" class="carousel slide">
            <div class="carousel-inner">
                <?php 
                $isActive = true; // Flag to set the first item as active
                $itemCounter = 0; // Counter to group items in rows

                foreach($product_shuffle as $item) :
                    // Start a new carousel-item for every 3 products
                    if ($itemCounter % 3 == 0) { 
                        if ($isActive) { ?>
                            <div class="carousel-item active">
                            <?php $isActive = false; 
                        } else { ?>
                            <div class="carousel-item">
                        <?php } ?>
                        <div class="row">
                    <?php } ?>

                    <!-- Product Card -->
                    <div class="col-md-4">
                        <div class="card">
                            <a href="<?php printf('%s?item_id=%s', 'product.view.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" class="card-img-top" alt="Product Image"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['item_name'] ?? 'Product Name'; ?></h5>
                                <p class="card-text">Latest tech with amazing features.</p>
                                <p class="card-price">$<?php echo $item['item_price'] ?? '0.00'; ?></p>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="submit_add_to_cart" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                            ?>

                        </form>
                            </div>
                        </div> 
                    </div>

                    <?php
                    // Close the row and carousel-item after every 3 items
                    if ($itemCounter % 3 == 2) { ?>
                        </div> <!-- End of row -->
                        </div> <!-- End of carousel-item -->
                    <?php }
                    $itemCounter++;
                endforeach;
                
                // In case last row doesn't have 3 items, close the divs
                if ($itemCounter % 3 != 0) {
                    echo '</div></div>';
                }
                ?>
            </div>
        </div>

        <!-- Carousel navigation buttons -->
        <div class="carousel-nav-buttons">
            <button class="btn btn-nav" type="button" data-bs-target="#topSalesCarousel" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-nav" type="button" data-bs-target="#topSalesCarousel" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Manually initialize the carousel using JS -->
<script>
    var myCarousel = document.getElementById('topSalesCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: false,  // Disables auto-sliding
        ride: false       // Prevents automatic ride
    });
</script>
