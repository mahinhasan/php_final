<?php
include_once 'navbar.php';
?>

<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="section-title bg-white text-center text-primary px-3">Sign Up</h6>
    </div>
    <div class="row g-2">

      <div class="col-lg-4 col-md-12 wow fadeInUp offset-4" data-wow-delay="0.5s">
        <form method="POST" action="../controler/signupCheck.php">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="Your User Name / Email">
                <label for="username">User Username</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                <label for="email">Your Email</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" onkeyup="validatePassword()">
                <label for="password">Your Password</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="gender" id="gender" placeholder="Your Gender">
                <label for="gender">Your Gender</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="phone" id="type" placeholder="User Number">
                <label for="number">Phone Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="address" id="type" placeholder="User Address">
                <label for="address">Your Address</label>
              </div>
            </div>


            <div class="col-12">
              <button class="btn btn-primary w-50 py-2" type="submit">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->

<script>
  function validatePassword() {
    var passwordInput = document.getElementById('password');
    var errorMessage = document.querySelector('.invalid-feedback');
    
    var password = passwordInput.value;

    var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;

    if (!passwordPattern.test(password)) {
      errorMessage.textContent = 'Password must be at least 6 characters long and contain at least one letter, one number, and one special character (@$!%*#?&)';
      passwordInput.classList.add('is-invalid');
    } else {
      errorMessage.textContent = '';
      passwordInput.classList.remove('is-invalid');
    }
  }
</script>


<?php
include_once 'footer.php';
?>
