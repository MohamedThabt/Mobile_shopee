<style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        .animated-image {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    <section class="cart">
        <div class="parent">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Wish List Is Empty</h2>
                <div class="row justify-content-center">
                    <!-- Image Column -->
                    <div class="col-12 d-flex justify-content-center">
                        <img src="view/assets/Add to Cart-amico.png" alt="Shopping Cart" class="img-fluid animated-image" style="width: 600px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>