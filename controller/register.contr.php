<?php

session_start();
require "../database/user.php";

// Check request method and submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $error = [];
    
    
 //======================================
//        validation                  ||
//======================================  
// use trim in condition to validate white spaces
    //*******************Name*******************
    if (empty(trim($_POST['name']))) {
        $error['name'] = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST['name']));
        if (strlen($name) > 40 || !preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error['name'] = "Name is not valid";
        }
    }

    //********************Email**************************
    if (empty(trim($_POST['email']))) {
        $error['email'] = "Email is required.";
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
    }

    //**********************Phone*************************
    if (!empty(trim($_POST['phone']))) {
        $phone = htmlspecialchars(trim($_POST['phone']));
        if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
            $error['phone'] = "Phone number must be between 10 to 15 digits.";
        }
    } else {
        $phone = null; // Or an empty string if you prefer
    }

    //*******************Password*****************
    if (empty(trim($_POST['password']))) {
        $error['password'] = "Password is required";
    } else {
        $password = trim($_POST['password']);
        if (strlen($password) < 8 || strlen($password) > 30) {
            $error['password'] = "Password must be between 8 and 30 characters.";
        } else {
            $hashed_Password = password_hash($password, PASSWORD_BCRYPT);
        }
    }

    //**********************Confirm Password ******************
    if (empty(trim($_POST['confirmPassword']))) {
        $error['confirmPassword'] = "Confirm Password is required.";
    } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
        $error['confirmPassword'] = "Passwords do not match.";
    }

    // If no errors, proceed with registration (database insertion)
    if (empty($error)) {
        $sql = "INSERT INTO user (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $phone, $hashed_Password]);
        
        // Fetch the user details
        $userId = $pdo->lastInsertId();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = ?");
        $stmt->execute([$userId]);
        $data = $stmt->fetchObject();

        // Store user info in session
        $_SESSION['user_id'] = $data->user_id;
        $_SESSION['user_name'] = $data->name;
        $_SESSION['user_email'] = $data->email;
        $_SESSION['user_phone'] = $data->phone;
        $_SESSION['login_done'] = "Hello " . $data->name;
        header("Location: ../login.view.php");
        exit();
    } else {
        // Store errors in session and redirect back
        $_SESSION['errors'] = $error;
        header("Location: ../register.view.php");
        exit();
    }
} else {
    echo "Invalid request method.";
}



