<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopee </title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="shortcut icon" href="view/assets/online-shop.png" type="image/x-icon">
</head>

<body>
    <!-- this code causes some problems when put it in the top -->
    <?php  require "function.php"; ?>
    <!-- Header  -->
    <header>
        <!-- primary nav  -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="view/assets/online-shop.png" alt="Store Icon" width="30" height="30"
                        class="d-inline-block align-text-top"> <!-- Your custom icon -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">On Sale</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li><a class="dropdown-item" href="#">Smartphones</a></li>
                                <li><a class="dropdown-item" href="#">Tablets</a></li>
                                <li>
                                    <hr class="dropdown-divider bg-secondary">
                                </li>
                                <li><a class="dropdown-item" href="#">Accessories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="productDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Product
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="productDropdown">
                                <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                                <li><a class="dropdown-item" href="#">Best Sellers</a></li>
                                <li>
                                    <hr class="dropdown-divider bg-secondary">
                                </li>
                                <li><a class="dropdown-item" href="#">All Products</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Coming Soon</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                 <a href="cart.view.php" class="btn btn-outline-light position-relative me-3 mt-2">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            2
                            <span class="visually-hidden">items in cart</span>
                        </span>
                    </a>
                </div>`
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