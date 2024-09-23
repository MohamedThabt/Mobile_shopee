<?php
 include "view/partial/header.php"; 
?>
    

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="view/assets/Login-amico.png" alt="Login illustration" class="img-fluid" style="max-width: 80%;">
            </div>
            <div class="col-md-6">
                <div class="form-container p-4">
                    <h4 class="text-center mb-4">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </h4>
                    <form class="needs-validation" novalidate method="post" action="controller/login.contr.php">
                        <!-- Email Error -->
                        <?php if (isset($_SESSION['error'])):?>
                        <div class="alert alert-danger text-center"><?php echo $_SESSION['error']?></div>
                        <?php unset($_SESSION['error']);?>
                        <?php endif;?>
                        <!-- Password Error -->
                        <?php if (isset($_SESSION['password_error'])):?>
                        <div class="alert alert-danger text-center"><?php echo $_SESSION['password_error']?></div>
                        <?php unset($_SESSION['password_error']);?>
                        <?php endif;?>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div class="form-floating flex-grow-1">
                                <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" required>
                                <label for="emailInput">Email</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <div class="form-floating flex-grow-1">
                                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                                <label for="passwordInput">Password</label>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <input type="submit" class="btn btn-primary" value="Login" name="submit">
                        </div>

                        <div class="text-center">
                            <p>Don't have an account? <a href="register.view.php" class="btn btn-outline-primary">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Validation Script -->
    <script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();
    </script>
    
    <style>
        /* Primary buttons (Login) */
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active {
            background-color: #e0a800 !important;
            border-color: #e0a800 !important;
            color: #000 !important;
        }

        /* Input group styles */
        .input-group-text {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .input-group-text:hover {
            background-color: #e0a800;
        }
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        /* Alert styles */
        .alert-danger {
            background-color: #ffc107;
            color: #000;
        }

        /* Override Bootstrap's default focus styles */
        .btn:focus, .btn.focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5) !important;
        }
        .btn-outline-primary {
            color: #ffc107;
            border-color: #ffc107;
        }
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.active {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: #000 !important;
        }
    </style>
</body>
</html>