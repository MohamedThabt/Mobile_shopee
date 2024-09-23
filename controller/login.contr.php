
<?php

session_start();
require "../database/user.php";

// Check request method and submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Validate inputs: trim to remove white space
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $Password = $_POST['password'];

    // Check if email exists in the database
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    // Return object of stmt with all info about that email
    $data = $stmt->fetchObject();

    if ($data) {
        // Verify password using password_verify function
        $check = password_verify($Password, $data->password);

        if ($check) {
            // Store user info in session
            $_SESSION['user_id'] = $data->user_id;
            $_SESSION['user_name'] = $data->name;
            $_SESSION['user_email'] = $data->email;
            
            // Check if phone exists before storing in session
            if (isset($data->phone)) {
                $_SESSION['user_phone'] = $data->phone;
            }
            
            $_SESSION['login_done'] = "Hello " . $data->name;

            // Redirect to home page
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['password_error'] = "Please enter the correct password.";
            header("Location: ../login.view.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "This email is not registered. Please go to the register page.";
        header("Location: ../login.view.php");
        exit();
    }
}
