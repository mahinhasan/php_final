<?php

require_once '../model/db.php'; // Include the database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $datetime = $_POST['datetime'];
    $destination = $_POST['destination'];
    $specialRequest = $_POST['special_request'];
    echo 'Destination: ' . $destination; // Add this line for debugging purposes

    // Insert the booking details into the tourBooking table
    $con = getConnection();

    $stmt = oci_parse($con, 'INSERT INTO tourBooking (booking_id, name, email, datetime, destination, special_request)
                            VALUES (booking_id_seq.nextval, :name, :email, :datetime, :destination, :special_request)');
    oci_bind_by_name($stmt, ':name', $name);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':datetime', $datetime);
    oci_bind_by_name($stmt, ':destination', $destination);
    oci_bind_by_name($stmt, ':special_request', $specialRequest);
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
