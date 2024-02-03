<?php
require_once "../model/db.php";
// For guide
function getGuides() {
    $con = getConnection();
    $stmt = oci_parse($con, 'SELECT * FROM GUIDE');
    oci_execute($stmt);
    
    $guides = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $guides[] = $row;
    }
    
    oci_free_statement($stmt);
    
    return $guides;
}



function countGuides() {
    $conn = getConnection();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $query = 'SELECT COUNT(*) AS total_rows FROM GUIDE';
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);
    
    
    $row = oci_fetch_assoc($stmt);
    $totalRows = $row['TOTAL_ROWS'];
    
    oci_free_statement($stmt);
    oci_close($conn);
    
    return $totalRows;
}

function countUser() {
    $conn = getConnection();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $query = 'SELECT COUNT(*) AS total_rows FROM USERS';
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);
    
    
    $row = oci_fetch_assoc($stmt);
    $totalRows = $row['TOTAL_ROWS'];
    
    oci_free_statement($stmt);
    oci_close($conn);
    
    return $totalRows;
}



?>