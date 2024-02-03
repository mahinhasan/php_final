

<form method="POST" action="../controler/bookTour.php" id="bookingForm">
  <div class="row g-3">
    <div class="col-md-6">
      <div class="form-floating">
        <input type="text" name="name" class="form-control bg-transparent" id="name" placeholder="Your Name">
        <label for="name">Your Name</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input type="email" name="email" class="form-control bg-transparent" id="email" placeholder="Your Email">
        <label for="email">Your Email</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating date" id="date3" data-target-input="nearest">
        <input type="datetime-local" name="datetime" class="form-control bg-transparent datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
        <label for="datetime">Date & Time</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <select class="form-select bg-transparent" name="destination" id="select1">
          <?php
            require_once '../model/db.php';
            $connection = getConnection();
            $query = 'SELECT place_name FROM worldTour';
            $statement = oci_parse($connection, $query);
            oci_execute($statement);
            while ($row = oci_fetch_assoc($statement)) {
              echo '<option value="' . $row['PLACE_NAME'] . '">' . $row['PLACE_NAME'] . '</option>';
            }
            oci_free_statement($statement);
            oci_close($connection);
          ?>
        </select>
        <label for="select1">Destination</label>
      </div>
    </div>
    <div class="col-12">
      <div class="form-floating">
        <textarea class="form-control bg-transparent" name="special_request" placeholder="Special Request" id="message" style="height: 100px"></textarea>
        <label for="message">Special Request</label>
      </div>
    </div>
    <div class="col-12">
      <?php
       

        // Check if the user is not logged in
        if (!isset($_SESSION['username'])) {
          echo '<button class="btn btn-outline-light w-100 py-3" type="button" onclick="showAlert()">Book Now</button>';
        } else {
          echo '<button class="btn btn-outline-light w-100 py-3" type="submit">Book Now</button>';
        }
      ?>
    </div>
  </div>
</form>
