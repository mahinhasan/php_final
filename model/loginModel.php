<?php

require_once "../model/db.php";


function checkLogin($username, $password) {

    
    $conn = getConnection();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        header('location:../view/index.php');
    }
    else{
        $query = "SELECT COUNT(*) FROM users WHERE username = :username AND password = :password";
       
        $stmt = oci_parse($conn, $query);
        
        oci_bind_by_name($stmt, ':username', $username);
        oci_bind_by_name($stmt, ':password', $password);
        oci_execute($stmt);
        
        $row = oci_fetch_array($stmt);
        $count = (int)$row[0];
        oci_free_statement($stmt);
        oci_close($conn);
    
        return $count === 1;
    
        
    }
  
}
?>
