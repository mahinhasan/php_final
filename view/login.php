<?php
include_once 'navbar.php';
?>

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">LOGIN</h6>
        </div>
        <div class="row g-2">
            
            <div class="col-lg-4 col-md-12 wow fadeInUp offset-4" data-wow-delay="0.5s">
                <form method="POST" action="../controler/loginCheck.php">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Your User Name / Email">
                                <label for="username">User Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
                                <label for="password">Your Password</label>
                            </div>
                        </div>
                        
                        
                        <div class="col-12">
                            <button class="btn btn-primary w-50 py-2" type="submit">LOGIN</button>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            echo '<div class="col-12 mt-3 text-danger">Invalid username or password. Please try again.</div>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php
include_once 'footer.php';
?>
