<?php
session_start();
require_once "../model/db.php";
require_once "../model/reservationModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel = $_POST['hotel'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $name = $_POST['name'];
    $address = $_POST['address'];
	//$username = $_SESSION['username']
	
	

    // Process the reservation and store data in the database
    $connection = getConnection();

    if ($connection) {
        $reservationData = [
            'hotel' => $hotel,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'name' => $name,
            'address' => $address
        ];

        $reservationId = insertReservation($reservationData);

        if ($reservationId) {
            $_SESSION['status'] = "Reservation confirmed. Thank you!";
            header('location:../view/index.php');
        } else {
            echo "Failed to insert reservation.";
        }

        oci_close($connection);
    } else {
        echo "Unable to establish a database connection.";
    }
}
?> 
