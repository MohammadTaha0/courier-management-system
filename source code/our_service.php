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
        <section class="py-7" id="services" container-xl="container-xl">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 text-center mb-3">
                        <h5 class="text-danger">SERVICES</h5>
                        <h2>Our services for you</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                        <div class="card h-100 px-lg-5 card-span">
                            <div class="card-body d-flex flex-column justify-content-around">
                                <div class="text-center pt-5"><img class="img-fluid" src="assets/img/icons/services-1.svg" alt="..." />
                                    <h5 class="my-4">Business Services</h5>
                                </div>
                                <p>Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Corporate goods
                                    </li>
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Shipment
                                    </li>
                                    <li class="mb-0"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Accesories
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                        <div class="card h-100 px-lg-5 card-span">
                            <div class="card-body d-flex flex-column justify-content-around">
                                <div class="text-center pt-5"><img class="img-fluid" src="assets/img/icons/services-2.svg" alt="..." />
                                    <h5 class="my-4">Statewide Services</h5>
                                </div>
                                <p>Offering home delivery around the city, where your products will be at your doorstep within 48-72 hours.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Unlimited Bandwidth
                                    </li>
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Encrypted Connection
                                    </li>
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Yes Traffic Logs
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                        <div class="card h-100 px-lg-5 card-span">
                            <div class="card-body d-flex flex-column justify-content-around">
                                <div class="text-center pt-5"><img class="img-fluid" src="assets/img/icons/services-3.svg" alt="..." />
                                    <h5 class="my-4">Personal Services</h5>
                                </div>
                                <p>You can trust us to safely deliver your most sensitive documents to the specific area in a short time.</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Unlimited Bandwidth
                                    </li>
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Encrypted Connection
                                    </li>
                                    <li class="mb-2"><span class="me-2"><i class="fas fa-circle text-primary" style="font-size:.5rem"></i></span>Yes Traffic Logs
                                    </li>
                                </ul>
                            </div>
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