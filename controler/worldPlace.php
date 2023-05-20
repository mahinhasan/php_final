<?php
require_once "../model/db.php";

function getWorldTours() {
    $con = getConnection();
    $stmt = oci_parse($con, 'SELECT * FROM worldTour');
    oci_execute($stmt);
    
    $worldTours = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $worldTours[] = $row;
    }
    
    oci_free_statement($stmt);
    
    return $worldTours;
}



function countWorldTourRows() {
    $conn = getConnection();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $query = 'SELECT COUNT(*) AS total_rows FROM worldTour';
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);
    
    
    $row = oci_fetch_assoc($stmt);
    $totalRows = $row['TOTAL_ROWS'];
    
    oci_free_statement($stmt);
    oci_close($conn);
    
    return $totalRows;
}



?>