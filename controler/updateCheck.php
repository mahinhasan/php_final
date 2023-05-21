<?php
require_once '../model/db.php';
$conn = getConnection();

try {
    // Get the user ID and other updated values from the form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($username === "mahin") {
        echo '<script>alert("This is the super user!");</script>';
        echo '<script>window.location.href = "../view/admin.php";</script>';
        exit;
    }

    $plsql = "
        BEGIN
            UPDATE users
            SET USERNAME = :username,
                EMAIL = :email,
                GENDER = :gender,
                PHONE = :phone,
                ADDRESS = :address
            WHERE ID = :id;
            COMMIT;
        EXCEPTION
            WHEN OTHERS THEN
                ROLLBACK;
                RAISE;
        END;
    ";

    $stid = oci_parse($conn, $plsql);
    oci_bind_by_name($stid, ':username', $username);
    oci_bind_by_name($stid, ':email', $email);
    oci_bind_by_name($stid, ':gender', $gender);
    oci_bind_by_name($stid, ':phone', $phone);
    oci_bind_by_name($stid, ':address', $address);
    oci_bind_by_name($stid, ':id', $id);

    if (oci_execute($stid)) {
        echo '<script>window.location.href = "../view/admin.php";</script>';
    } else {
        echo "An error occurred during the update.";
    }

    oci_free_statement($stid);
} catch (Exception $e) {
    echo "An error occurred during the update: " . $e->getMessage();
}

oci_close($conn);
?>
