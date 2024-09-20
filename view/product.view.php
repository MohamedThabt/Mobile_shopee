<?php
require "../database/DBController.php"; 
require "../database/Product.php"; 
$db = new DBController(); 
$product = new Product($db);
$product ->getData(table : 'product');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopee</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="assets/online-shop.png" type="image/x-icon">
</head>
<body>
    <!-- Header  -->
    <header>
        <!-- primary nav  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/online-shop.png" alt="Store Icon" width="30" height="30" class="d-inline-block align-text-top"> <!-- Your custom icon -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">On Sale</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li><a class="dropdown-item" href="#">Smartphones</a></li>
                                <li><a class="dropdown-item" href="#">Tablets</a></li>
                                <li><hr class="dropdown-divider bg-secondary"></li>
                                <li><a class="dropdown-item" href="#">Accessories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Product
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="productDropdown">
                                <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                                <li><a class="dropdown-item" href="#">Best Sellers</a></li>
                                <li><hr class="dropdown-divider bg-secondary"></li>
                                <li><a class="dropdown-item" href="#">All Products</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Coming Soon</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="cart.php" class="btn btn-outline-light position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                            <span class="visually-hidden">items in cart</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- second nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Wish List -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-heart"></i> Wish List
                            </a>
                        </li>
                        <!-- Login -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <!-- Logout -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header  -->
    <main>
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
                <img src="assets/Online ads-amico.png" alt="Additional Image" class="img-fluid rounded shadow">
            </div>
            <!-- Product Details -->
            <div class="col-md-8 equal-height d-flex align-items-center"> <!-- Added Flexbox classes -->
                <div class="card shadow-lg border-0 h-100 w-100"> <!-- Ensure the card takes full height and width -->
                    <div class="row g-0 h-100"> <!-- Ensure the row takes full height -->
                        <!-- Product Image -->
                        <div class="col-md-6 h-100 d-flex flex-column align-items-center justify-content-center"> <!-- Added Flexbox classes -->
                            <img src="<?php echo preg_replace('/^view\//', '', $item['item_image'])?? 'default_image.jpg'; ?>" alt="Phone" class="img-fluid rounded mb-3">
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
    <?php include "partial/footer.php";?>
