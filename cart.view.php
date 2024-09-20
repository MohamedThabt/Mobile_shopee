<?php include"view/partial/header.php"; ?>  
  
  <!-- Cart Section -->
    <section class="cart">
        <div class="parent">
            <div class="container mt-5">
                <h2>Your Cart</h2>
                <div class="row mt-4">
                    <!-- Products List -->
                    <div class="col-md-8">
                        <!-- Cart Item 1 -->
                        <div class="cart-item row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/80" alt="Product Image">
                            </div>
                            <div class="col-md-3">
                                <h5>Mobile X</h5>
                                <p>XYZ Tech</p>
                                <p><strong>Price: $499.00</strong></p>
                            </div>
                            <div class="col-md-3 quantity-wrapper">
                                <input type="number" class="quantity-input form-control" value="1" min="1" max="10">
                            </div>
                            <div class="col-md-2 text-center">
                                <p><strong>Subtotal:</strong> $499.00</p>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn btn-wishlist btn-sm">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item row align-items-center">
                            <div class="col-md-2">
                                <img src="https://via.placeholder.com/80" alt="Product Image">
                            </div>
                            <div class="col-md-3">
                                <h5>Tablet Pro</h5>
                                <p>ABC Tech</p>
                                <p><strong>Price: $299.00</strong></p>
                            </div>
                            <div class="col-md-3 quantity-wrapper">
                                <input type="number" class="quantity-input form-control" value="2" min="1" max="10">
                            </div>
                            <div class="col-md-2 text-center">
                                <p><strong>Subtotal:</strong> $598.00</p>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn btn-wishlist btn-sm">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Subtotal and Proceed to Checkout -->
                    <div class="col-md-4">
                        <div class="subtotal-wrapper">
                            <h5>Subtotal: $1,097.00</h5>
                            <button class="btn btn-yellow btn-lg">
                                <i class="fas fa-credit-card"></i> Proceed to Buy All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Add to Cart Alert -->
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Added to Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        The product has been successfully added to your cart!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include "view/partial/footer.php";?>