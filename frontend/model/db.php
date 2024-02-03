<?php


function getConnection()
{
    

    $con = oci_connect('XE', 'tiger', '//localhost/XE');
    if ($con) {
        return $con;
    } else {
        echo " Connection Error";
    }
    
}



?>