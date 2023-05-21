<?php

include_once 'db.php';

function insertReservation($reservationData)
{
    $connection = getConnection();
    if ($connection) {
        $query = "INSERT INTO HOTELS (HOTEL_NAME, CHECKIN, CHECKOUT, NAME, ADDRESS) 
                  VALUES (:HOTEL_NAME, TO_DATE(:CHECKIN, 'YYYY-MM-DD'), TO_DATE(:CHECKOUT, 'YYYY-MM-DD'), :NAME, :ADDRESS)";

        $statement = oci_parse($connection, $query);

        oci_bind_by_name($statement, ':HOTEL_NAME', $reservationData['hotel']);
        oci_bind_by_name($statement, ':CHECKIN', $reservationData['checkin']);
        oci_bind_by_name($statement, ':CHECKOUT', $reservationData['checkout']);
        oci_bind_by_name($statement, ':NAME', $reservationData['name']);
        oci_bind_by_name($statement, ':ADDRESS', $reservationData['address']);

        $result = oci_execute($statement);

        if ($result) {
            oci_commit($connection);
            oci_free_statement($statement);
            oci_close($connection);
            return true;
        } else {
            $error = oci_error($statement);
            
            if ($error['code'] == 1) {
                echo "Error: Duplicate reservation. You have already made a reservation.";
            } else {
                header('Location:../view/404.php');
            }
            
            oci_rollback($connection);
            oci_free_statement($statement);
            oci_close($connection);
            return false;
        }
    } else {
        echo "Unable to establish a database connection.";
        return false;
    }
}


?>