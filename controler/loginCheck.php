<?php
session_start();
require_once "../model/loginModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errors = array();

    if (empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // Check for errors
    if (!empty($errors)) {
        // Display error messages
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        
        $loginStatus = checkLogin($username, $password);
        
        if ($loginStatus === true) {
            
            $_SESSION['username'] = $username;
            if ($username === 'mahin') {
                header('Location: ../view/admin.php');
            } else {
                header('Location: ../view/index.php');
            }
            exit();
        } else {
            echo $loginStatus;
            echo "Invalid username or password";
        }
    }
}


?>
