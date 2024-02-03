<?php
session_start();
require_once "../model/signupModel.php";

// Retrieve form data
$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];


// Perform validation
$errors = array();

if (empty($name)) {
    $errors[] = "Username is required";
}

if (empty($email)) {
    $errors[] = "Email is required";
} 
// // elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// //     $errors[] = "Invalid email format";
// }

if (empty($password)) {
    $errors[] = "Password is required";
}

if (empty($gender)) {
    $errors[] = "Gender is required";
}

if (empty($phone)) {
    $errors[] = "Phone number is required";
}

if (empty($address)) {
    $errors[] = "Address is required";
}

// Check for errors
if (!empty($errors)) {
    // Display error messages
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    // Validated, proceed with saving the data
    $user = [
        'username' => $name,
        'email' => $email,
        'password' => $password,
        'gender' => $gender,
        'phone' => $phone,
        'address' => $address,
        
    ];

    $status = insertUser($user);

    if ($status) {
        header('Location: ../view/login.php');
        $_SESSION['status'] = $name;
    } else {
        echo "DB error";
    }
}
?>
