<?php 
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'link.php'; ?>

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?php
        include "header.php";
        ?>
        <section class="py-xxl-10 pb-0" id="home">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
            </div>
            <!--/.bg-holder-->
        </section>




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section id="findUs">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 mb-6 text-center">
                        <h5 class="text-danger">FIND US</h5>
                        <h2>Access us easily</h2>
                    </div>
                    <div class="col-12">
                        <div class="card card-span rounded-2 mb-3">
                            <div class="row">
                                <div class="col-md-6 col-lg-7 d-flex"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28938.688945727063!2d67.03164573217373!3d24.954676435791857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e584b891c3%3A0x29b2cbc198ba2dbd!2sAptech%20Computer%20Education%20North%20Karachi%20Center!5e0!3m2!1sen!2s!4v1659890124790!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                                <div class="col-md-6 col-lg-5 d-flex flex-center">
                                    <div class="card-body">
                                        <h5>Contact with us</h5>
                                        <p class="text-700 my-4"> <i class="fas fa-map-marker-alt text-warning me-3"></i><span>Aptech North karachi</span></p>
                                        <p><i class="fas fa-phone-alt text-warning me-3"></i><span class="text-700">Monday - Saturday: 09 am - 09pm<br /><span class="ps-4">Sunday: 11 am - 9pm </span></span></p>
                                        <p><i class="fas fa-envelope text-warning me-3"> </i><a class="text-700" href="mailto:mtaha1007@gmail.com"> mtaha1007@gmail.com</a></p>
                                        <ul class="list-unstyled list-inline mt-5">
                                            <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-facebook-square fs-2"></i></a></li>
                                            <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-instagram-square fs-2"></i></a></li>
                                            <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-twitter-square fs-2"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary px-5" type="submit"><i class="fas fa-phone-alt me-2"></i><a class="text-light" href="tel:02136930102">Call us to delivery 02136930102</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->



        <?php include 'footer.php'; ?>


    </main>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <?php include 'script.php'; ?>


</body>

</html>