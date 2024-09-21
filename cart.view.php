<?php 
include"view/partial/header.php";

?>

<!-- Cart Section -->
<section class="cart">
    <div class="parent">
        <div class="container mt-5">
            <h2>Your Cart</h2>
            <div class="row mt-4">
                <!-- Products List -->
                <div class="col-md-8">
                <?php 
                    // to fetch every product info
                    $product->getProduct();
                    // to fetch all cart items:
                    foreach($product->getData(table:'cart') as $item):
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                    ?>
                    <div class="card mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2">
                                <img src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" alt="Product Image" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['item_name'] ?? 'Mobile'; ?></h5>
                                    <p class="card-text"><?php echo $item['item_barnd'] ?? 'Company'; ?></p>
                                    <p class="card-text"><strong><?php echo $item['item_price'] ?? '00.00'; ?></strong></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger me-2">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-heart"></i> Wish List
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
                    <!-- Subtotal and Proceed to Checkout -->
                </div>
                <div class="col-md-4">
                    <div class="subtotal-wrapper">
                        <h5> Cart Items:<?php echo count($product->getData('cart'))?></h5>
                        <h5>Subtotal:<?php echo $Cart->getSum($subTotal) . " $";?></h5>
                        <button class="btn btn-yellow btn-lg">
                            <i class="fas fa-credit-card"></i> Proceed to Buy All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>