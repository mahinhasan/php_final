<?php
session_start();
require_once '../model/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $datetime = $_POST['datetime'];
    $destination = $_POST['destination'];
    $specialRequest = $_POST['special_request'];
    echo 'Destination: ' . $destination; 

    $username = $_SESSION['username'];
    
    $con = getConnection();

    $stmt = oci_parse($con, 'INSERT INTO tourBooking (booking_id, name, email, datetime, destination, special_request,username)
                            VALUES (booking_id_seq.nextval, :name, :email, :datetime, :destination, :special_request,:username)');
    oci_bind_by_name($stmt, ':name', $name);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':datetime', $datetime);
    oci_bind_by_name($stmt, ':destination', $destination);
    oci_bind_by_name($stmt, ':special_request', $specialRequest);
    oci_bind_by_name($stmt, ':username', $username);

    $result = oci_execute($stmt);

    if ($result) {
        header('Location:../view/index.php');
        echo 'Tour booked successfully!';
    } else {
        $error = oci_error($stmt);
        echo 'Failed to book the tour. Error: ' . $error['message'];
    }

    oci_free_statement($stmt);
    oci_close($con);
}

?>
