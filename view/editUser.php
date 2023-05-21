<?php
include_once 'navbar.php';
?>
   <div class="container-xxl py-5">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="section-title bg-white text-center text-primary px-3">Edit User</h6>
    </div>
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
        ?>

        <div class="row g-2">
            <div class="col-lg-4 col-md-12 wow fadeInUp offset-4" data-wow-delay="0.5s">
                <form method="POST" action="../controler/updateCheck.php">
                    <input type="hidden" name="id" value="<?php echo $user['ID']; ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['USERNAME']; ?>">
                                <label for="username">User Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['EMAIL']; ?>">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $user['GENDER']; ?>">
                                <label for="gender">Your Gender</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user['PHONE']; ?>">
                                <label for="phone">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $user['ADDRESS']; ?>">
                                <label for="address">Your Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-50 py-2" type="submit">Update User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } else {
        // Redirect to the admin page if the form is not submitted
        header("Location:admin.php");
        exit;
    }
    ?>
  </div>
</div>

<?php
include_once 'footer.php';
?>
