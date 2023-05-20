<?php
session_start();
require_once "../model/signupModel.php";

// Retrieve form data
$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$address = $_POST['address'];
$usertype = $_POST['usertype'];

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

if (empty($number)) {
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
    $contract = [
        'username' => $name,
        'email' => $email,
        'password' => $password,
        'gender' => $gender,
        'number' => $number,
        'address' => $address,
        'usertype' => $usertype
    ];

    $status = insertUser($contract);

    if ($status) {
        header('Location: ../view/login.php');
        $_SESSION['status'] = $name;
    } else {
        echo "DB error";
    }
}
?>
