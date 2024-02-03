<?php
include_once 'navbar.php';
?>





    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
                <h1 class="mb-5">Meet Our Guide</h1>
            </div>
            



            <div class="row g-4">
            <?php
    require_once "../controler/allGuides.php";

    $allguides = getAllGuides();

    foreach ($allguides as $guide) {
        $name = $guide['NAME'];
        $address = $guide['ADDRESS'];
        $phone = $guide['PHONE'];
        $area = $guide['AREA'];
        ?>



                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo $name; ?></h5>
                            <small><?php echo $area; ?></small>
                        </div>
                    </div>
                </div>

                <?php
    }
    ?>
 
            </div>
            
   
        </div>
    </div>
    <!-- Team End -->

<?php
include_once 'footer.php'
?>