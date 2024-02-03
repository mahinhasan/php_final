<!DOCTYPE html>
<html>
<head>
    <link href="../css/reservationC.css" rel="stylesheet">
    <title>Reservation Confirmation</title>
</head>
<body>
    <header>
        <h1>Reservation Confirmation</h1>
    </header>

    <main>
        <section>
            <div class="reservation-details">
                <h2>We are at your service</h2>
                <div class="hotel-details">
                    
                    <?php
                    // Retrieve the hotel name from the GET request
                    $hotelName = $_GET['hotel'];
                    
                    // Define an associative array to map hotel names to image URLs
                    $hotelImages = array(
                        'Pan pacific sonargaon dhaka' => '../img/hotel1.jpg',
                        'The Westin Dhaka' => '../img/hotel2.jpg',
                        'Radisson Blu Dhaka Water Garden' => '../img/hotel3.jpg',
                        'Amari Dhaka' => '../img/hotel4.jpg',
                        'Six Seasons Hotel' => '../img/hotel5.jpg',
                        'Dhaka Regency Hotel & Resort' => '../img/hotel6.jpg'
                    );
                    
                    // Retrieve the image URL based on the hotel name
                    $hotelImage = isset($hotelImages[$hotelName]) ? $hotelImages[$hotelName] : '';
                    
                    ?>
                    
                    
                    
                    

                    <img src="<?php echo $hotelImage; ?>" alt="<?php echo $hotelName; ?>">
                    <h3><?php echo $hotelName; ?></h3>
                </div>
            </div>

            <div class="reservation-form">
                <h2>Reservation Information</h2>
                <form action="../controler/processReservation.php" method="POST">
                    <input type="hidden" name="hotel" value="<?php echo $hotelName; ?>">
                    <label for="checkin">Check-in Date:</label>
                    <input type="date" id="checkin" name="checkin" required>

                    <label for="checkout">Check-out Date:</label>
                    <input type="date" id="checkout" name="checkout" required>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>

                    <button type="submit">Confirm Reservation</button>
                    <?php
                    
                    ?>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
