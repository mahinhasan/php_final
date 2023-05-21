<?php
    include_once '../view/navbar.php';
?>


<style>

    h2{
        text-transform : uppercase;
    }

    h3{
        text-transform : uppercase;
        text-align:center;
    }
    .results-table {

        width:80%;
        border-collapse: collapse;
        margin-left:80px;
    }

    .results-table th, .results-table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    .results-table th {
        background-color: #f2f2f2;
    }

    .results-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>


<?php




require_once "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchText = $_POST["search"];
    
    $contacts = searchRecordsContact("CONTACT", $searchText);
    $tourBookings = searchRecordsTour("TOURBOOKING", $searchText);
    
    if (!empty($contacts) || !empty($tourBookings)) {
        echo "<h2>Search Results:</h2>";
        
        if (!empty($contacts)) {
            echo "<h3>Contact Records:</h3>";
            echo '<table class="results-table">';
            echo '<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>';
            
            foreach ($contacts as $contact) {
                echo "<tr>";
                echo "<td>" . $contact['NAME'] . "</td>";
                echo "<td>" . $contact['EMAIL'] . "</td>";
                echo "<td>" . $contact['SUBJECT'] . "</td>";
                echo "<td>" . $contact['MESSAGE'] . "</td>";
                echo "</tr>";
            }
            
            echo '</table>';
        }
        
        if (!empty($tourBookings)) {
            echo "<h3>Tour Booking Records:</h3>";
            echo '<table class="results-table">';
            echo '<tr><th>Booking ID</th><th>Name</th><th>Email</th><th>Date/Time</th><th>Destination</th><th>Special Request</th><th>Username</th></tr>';
            
            foreach ($tourBookings as $booking) {
                echo "<tr>";
                echo "<td>" . $booking['BOOKING_ID'] . "</td>";
                echo "<td>" . $booking['NAME'] . "</td>";
                echo "<td>" . $booking['EMAIL'] . "</td>";
                echo "<td>" . $booking['DATETIME'] . "</td>";
                echo "<td>" . $booking['DESTINATION'] . "</td>";
                echo "<td>" . $booking['SPECIAL_REQUEST'] . "</td>";
                echo "<td>" . $booking['USERNAME'] . "</td>";
                echo "</tr>";
            }
            
            echo '</table>';
        }
    } else {
        echo "<p>No results found.</p>";
    }
}


function searchRecordsContact($tableName, $searchText)
{
    $con = getConnection();
    $stmt = oci_parse($con, "SELECT * FROM $tableName WHERE name LIKE :searchText OR email LIKE :searchText OR subject LIKE :searchText OR message LIKE :searchText");
    
    $searchPattern = '%' . $searchText . '%';
    oci_bind_by_name($stmt, ":searchText", $searchPattern);
    
    oci_execute($stmt);
    
    $records = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $records[] = $row;
    }
    
    oci_free_statement($stmt);
    
    return $records;
}


function searchRecordsTour($tableName, $searchText)
{
    $con = getConnection();
    $stmt = oci_parse($con, "SELECT * FROM $tableName WHERE NAME LIKE :searchText OR EMAIL LIKE :searchText OR DESTINATION	 LIKE :searchText OR USERNAME LIKE :searchText");
    
    $searchPattern = '%' . $searchText . '%';
    oci_bind_by_name($stmt, ":searchText", $searchPattern);
    
    oci_execute($stmt);
    
    $records = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $records[] = $row;
    }
    
    oci_free_statement($stmt);
    
    return $records;
}
?>


<?php

    include_once '../view/footer.php';
?>