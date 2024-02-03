<?php
require_once '../model/db.php';

// Check if the user ID is provided via POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a database connection
    $conn = getConnection();

    // Prepare the delete statement
    $stid = oci_parse($conn, "DELETE FROM users WHERE id = :id");

    // Bind the parameter
    oci_bind_by_name($stid, ":id", $id);

    // Execute the delete statement
    $result = oci_execute($stid);

    // Free the statement and close the connection
    oci_free_statement($stid);
    oci_close($conn);

    // Redirect back to the admin page after deletion
    header("Location: ../view/admin.php");
    exit();
} else {
    // If the user ID is not provided, redirect back to the admin page
    header("Location: ../view/admin.php");
    exit();
}
?>
