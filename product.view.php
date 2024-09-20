<?php
include"view/partial/header.php";
$product ->getData(table : 'product');
?>
<?php
    // fetch product id
$item_id=$_GET['item_id']?? 1;
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
        <div class="col-md-8 equal-height d-flex align-items-center"> <!-- Added Flexbox classes -->
            <div class="card shadow-lg border-0 h-100 w-100"> <!-- Ensure the card takes full height and width -->
                <div class="row g-0 h-100"> <!-- Ensure the row takes full height -->
                    <!-- Product Image -->
                    <div class="col-md-6 h-100 d-flex flex-column align-items-center justify-content-center"> <!-- Added Flexbox classes -->
                        <img src="<?php echo $item['item_image']?? 'default_image.jpg'; ?>" alt="Phone" class="img-fluid rounded mb-3">
                        <button class="btn btn-yellow">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
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
                        <!-- Quantity Selector -->
                        <div class="my-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" id="quantity" class="form-control d-inline" style="width: 100px;" placeholder="1" min="1" max="10">
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
