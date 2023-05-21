<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <!-- Add your CSS and other head elements here -->
</head>
<body>
    <h1>Edit User</h1>
    <?php
    require_once '../model/db.php';

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the user ID from the form
        $id = $_POST['id'];

        // Retrieve the user information from the database
        $conn = getConnection();
        $query = oci_parse($conn, "SELECT * FROM users WHERE id = :id");
        oci_bind_by_name($query, ":id", $id);
        oci_execute($query);
        $user = oci_fetch_assoc($query);

        // Close the database connection
        oci_free_statement($query);
        oci_close($conn);

        // Display the form for editing the user information
        echo '
        <form method="POST" action="../controler/updateCheck.php">
            <input type="hidden" name="id" value="' . $user['ID'] . '">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="' . $user['USERNAME'] . '"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $user['EMAIL'] . '"><br><br>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="' . $user['GENDER'] . '"><br><br>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="' . $user['PHONE'] . '"><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="' . $user['ADDRESS'] . '"><br><br>
            <button type="submit">Update User</button>
        </form>';
    } else {
        // Redirect to the admin page if the form is not submitted
        header("Location:admin.php");
        exit;
    }
    ?>
</body>
</html>
