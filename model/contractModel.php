<?php
require_once "db.php";


function insertUser($contract)
{
    $con = getConnection();
    $sql = "insert into contact(name, email,subject,message) values(:name, :email,:subject,:message)";
    $stmt = oci_parse($con, $sql);

    oci_bind_by_name($stmt, ':name', $contract['name']);
   
    oci_bind_by_name($stmt, ':email', $contract['email']);
    oci_bind_by_name($stmt, ':subject', $contract['subject']);
    oci_bind_by_name($stmt, ':message', $contract['message']);
   

    $status = oci_execute($stmt);
    return $status;
}




?>