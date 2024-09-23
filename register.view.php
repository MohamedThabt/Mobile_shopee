<?php
 include "view/partial/header.php"; 
?>
<!-- form -->

<div class="container custom-container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container p-4">
                <h4 class="text-center mb-2">Sing Up</h4>
                <form class="needs-validation" novalidate method="post" action="controller/register.contr.php">
                
                <!-- Display error messages -->
                <?php
                if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div class="alert alert-danger text-center">' . htmlspecialchars($error) . '</div>';
                    }
                    unset($_SESSION['errors']);
                }
                ?>

                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full Name" required>
                            <label for="nameInput">Full Name</label>
                        </div>
                    </div>

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
                            <i class="fas fa-phone"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="tel" class="form-control" id="phoneInput" name="phone" placeholder="Phone Number">
                            <label for="phoneInput">Phone Number</label>
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

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="confirmPasswordInput" name="confirmPassword" placeholder="Confirm Password" required>
                            <label for="confirmPasswordInput">Confirm Password</label>
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="view/assets/Sign up-amico.png" alt="Registration illustration" class="img-fluid">
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
                    // Custom validation for password confirmation
                    var password = document.getElementById('passwordInput')
                    var confirmPassword = document.getElementById('confirmPasswordInput')

                    // Always reset custom validity before re-checking
                    confirmPassword.setCustomValidity('')

                    if (password.value !== confirmPassword.value) {
                        confirmPassword.setCustomValidity('Passwords do not match')
                    }

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })();
    </script>

    <!-- Custom CSS to match #ffc107 with enhanced hover and click effects -->
    <style>
/* Primary buttons (Sign Up) */
.btn-primary {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000; /* Changed to black for better contrast */
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active {
    background-color: #e0a800 !important; /* Darker yellow */
    border-color: #e0a800 !important;
    color: #000 !important;
}

/* Outline button (Login) */
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
    </style>
</body>
