<!-- Cart Section -->
<section class="cart">
    <div class="parent">
        <div class="container mt-5">
            <h2>Your Wish List</h2>
            <div class="row mt-4">
                <!-- Products List -->
                <div class="col-md-8">
                    <?php
                foreach ($product->getData('wishlist') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                ?>
                    <div class="card mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2">
                                <img src="<?php echo $item['item_image'] ?? 'default_image.jpg'; ?>" alt="Product Image"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $item['item_name'] ?? 'Mobile'; ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo $item['item_brand'] ?? 'Company'; ?>
                                    </p>
                                    <p class="card-text"><strong>
                                            <?php echo $item['item_price'] ?? '00.00'; ?>
                                        </strong></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-end">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id']?? 0; ?>" name="item_id">
                                        <button class="btn btn-danger me-2" name="delete_wish_list_item">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id']?? 0; ?>" name="item_id">
                                        <button class="btn btn-warning me-2" name="add_to_cart_from_wish_list">
                                            <i class="fas fa-cart-plus"></i> Add To Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        return $item['item_price'];
                    }, $cart); // closing array_map function
                endforeach;
                ?>
                </div>
            </div>
        </div>
    </div>
</section>