<?php
require_once "../model/db.php";

function getAllGuides() {
    $con = getConnection();
    $stmt = oci_parse($con, 'SELECT * FROM GUIDE');
    oci_execute($stmt);
    
    $allguides = array();
    while ($row = oci_fetch_assoc($stmt)) {
        $allguides[] = $row;
    }
    
    oci_free_statement($stmt);
    
    return $allguides;
}







?>