<?php
include"view/partial/header.php";
?>
<?php
    // fetch product id
$item_id=$_POST['item_id'];
foreach($product->getData() as $item):
    if($item['item_id']== $item_id): 
?>
<!-- Product details -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Image -->
        <div class="col-md-4 text-center mb-4 equal-height d-flex align-items-center justify-content-center"> <!-- Added Flexbox classes -->
            <img src="view/assets/Online ads-amico.png" alt="Additional Image" class="img-fluid rounded shadow">
        </div>
        <!-- Product Details -->
        <div class="col-md-8 equal-height d-flex align-items-center"> 
            <div class="card shadow-lg border-0 h-100 w-100"> 
                <div class="row g-0 h-100"> 
                    <!-- Product Image -->
                    <div class="col-md-6 h-100 d-flex flex-column align-items-center justify-content-center"> <!-- Added Flexbox classes -->
                        <img src="<?php echo $item['item_image'];  ?>" alt="Phone" class="img-fluid rounded mb-3">
                        <!-- cart button -->
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
                    <!-- Product Info -->
                    <div class="col-md-6 p-4 h-100"> <!-- Added h-100 to ensure the column is 100% height -->
                        <h2 class="mt-3 text-warning"> <?php echo $item['item_name'] ?? 'Product Name'; ?></h2>
                        <p class="card-price">$ <?php echo $item['item_price'] ?? '0.00'; ?></p>
                        <!-- Color Options -->
                        <div class="my-4">
                            <h5>Colors:</h5>
                            <span class="color-circle bg-secondary me-2" title="Gray"></span>
                            <span class="color-circle bg-primary me-2" title="Blue"></span>
                            <span class="color-circle bg-dark" title="Black"></span>
                        </div>
                        <!-- Product Description -->
                        <div class="mt-4">
                            <h5>Description:</h5>
                            <p>This is a high-quality mobile device from XYZ Tech featuring the latest technology,
                                sleek design, and superior performance. Perfect for tech enthusiasts looking for a
                                powerful yet stylish phone.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif; 
endforeach;
?>
<?php include "view/partial/footer.php";?>
