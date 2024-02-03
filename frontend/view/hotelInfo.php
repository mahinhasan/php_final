<?php

    include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href="../css/hotel2.css" rel="stylesheet">
    <title>Hotel Reservation</title>
</head>
<body>
    <header>
        <h1>Hotel Reservation</h1>
    </header>

    <main>
        <section>
            <h2>Available Hotels</h2>
            <div class="hotel-list">
                <div class="hotel">
                    <img src="../img/hotel1.jpg" alt="hotel A">
                    <h3>Pan pacific sonargaon dhaka</h3>
                    <p>Luxurious hotel located in the heart of Dhaka(107 Kazi Nazrul Islam Avenue, Dhaka 1215, Bangladesh)</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="Pan pacific sonargaon dhaka">
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="hotel">
                    <img src="../img/hotel2.jpg" alt="Hotel B">
                    <h3>The Westin Dhaka</h3>
                    <p>Indulge in a world-class experience of elegance and relaxation at The Westin Dhaka, (Gulshan-2, Dhaka 1212, Bangladesh)</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="The Westin Dhaka">
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="hotel">
                    <img src="../img/hotel3.jpg" alt="Hotel C">
                    <h3>Radisson Blu Dhaka Water Garden</h3>
                    <p>Modern amenities and warm hospitality create an unforgettable retreat</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="Radisson Blu Dhaka Water Garden">
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="hotel">
                    <img src="../img/hotel4.jpg" alt="Hotel C">
                    <h3>Amari Dhaka</h3>
                    <p>Stylish accommodations combine to offer a truly remarkable stay.</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="Amari Dhaka">
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="hotel">
                    <img src="../img/hotel5.jpg" alt="Hotel C">
                    <h3>Six Seasons Hotel</h3>
                    <p>Experience the epitome of luxury and personalized service at Six Seasons Hotel.</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="Six Seasons Hotel">
                        <button type="submit">Book Now</button>
                    </form>
                </div>
                <div class="hotel">
                    <img src="../img/hotel6.jpg" alt="Hotel C">
                    <h3>Dhaka Regency Hotel & Resort</h3>
                    <p>Escape to a haven of relaxation and sophistication at Dhaka Regency Hotel & Resort</p>
                    <form action="reservationConfirm.php" method="GET">
                        <input type="hidden" name="hotel" value="Dhaka Regency Hotel & Resort">
                        <button type="submit">Book Now</button>
                    </form>
</html>