<?php
require_once "db.php";

function insertUser($signup)
{
    $con = getConnection();
    $sql = "INSERT INTO users(username, email,password, gender,number,address,usertype)
            VALUES(:username, :email,:password,:gender,:number,:address,:usertype)";
    $stmt = oci_parse($con, $sql);

    oci_bind_by_name($stmt, ':username', $signup['username']);
    oci_bind_by_name($stmt, ':email', $signup['email']);
    oci_bind_by_name($stmt, ':password', $signup['password']);
    oci_bind_by_name($stmt, ':gender', $signup['gender']);
    oci_bind_by_name($stmt, ':number', $signup['number']);
    oci_bind_by_name($stmt, ':address', $signup['address']);
    oci_bind_by_name($stmt, ':usetype', $signup['usertype']);

    $status = oci_execute($stmt);
    return $status;
}
?>
