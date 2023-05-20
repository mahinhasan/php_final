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


?>