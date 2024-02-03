<?php
session_start();
require_once "../model/contractModel.php";

//$id = $_POST['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


if ($name == "") {
    header('location:../view/index.php');
} else {

    $contract = ['name' => $name,'email' => $email,'subject' => $subject,'message' => $message];
    $status = insertUser($contract);


    if ($status) {
        header('location:../view/index.php');
        $_SESSION['status'] = $name;
    } else {
    
        echo "DB error";
    }
}

?>