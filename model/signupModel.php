<?php
require_once "db.php";

function insertUser($signup)
{
    $con = getConnection();
    $sql = "INSERT INTO users(id,username, email,password, gender,phone,address)
            VALUES(users_seq.NEXTVAL,:username, :email,:password,:gender,:phone,:address)";
    $stmt = oci_parse($con, $sql);

    oci_bind_by_name($stmt, ':username', $signup['username']);
    oci_bind_by_name($stmt, ':email', $signup['email']);
    oci_bind_by_name($stmt, ':password', $signup['password']);
    oci_bind_by_name($stmt, ':gender', $signup['gender']);
    oci_bind_by_name($stmt, ':phone', $signup['phone']);
    oci_bind_by_name($stmt, ':address', $signup['address']);

    $status = oci_execute($stmt);
    return $status;
}
?>
