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
        <section>

            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 col-lg-5 col-xl-4"><img src="assets/img/illustrations/callback.png" alt="..." />
                        <h5 class="text-danger">Track Your Parcel</h5>
                        <h2>We will contact in the shortest time.</h2>
                        <p class="text-muted">Monday to Friday, 9am-5pm.</p>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <form class="row" method="POST">
                            <div class="mb-3">
                                <label class="form-label visually-hidden" for="inputName">Tracking ID</label>
                                <input class="form-control form-quriar-control" id="inputName" name="keyword" type="text" placeholder="Tracking ID" />
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit" name="track">Track<i class="fas fa-paper-plane ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <row>
                    <?php

                    if (isset($_POST['track'])) {
                        $keyword = $_POST['keyword'];
                        $run = mysqli_query($con, "SELECT * FROM `tbl_courier` WHERE `tracking_number`=$keyword");
                        if (mysqli_num_rows($run) > 0) {
                            while ($res = mysqli_fetch_array($run)) {
                                // echo "<script>alert(".$res['status'].")</script>"
                    ?>
                                <?php

                                switch ($res['status']) {
                                    case '1':
                                ?>
                                        <div class="col-11 my-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bg-danger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill bg-info'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '2':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bg-danger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bg-danger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '3':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '4':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Arrived At Destination</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '5':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Arrived At Destination</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Out For Delivery</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '6':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Arrived At Destination</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Out For Delivery</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Ready To Pickup</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '7':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Arrived At Destination</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Out For Delivery</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Ready To Pickup</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Delivered</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '8':
                                    ?>
                                        <div class="col-11 mt-4">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger mb-1" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary mb-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Collected</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> Shipped</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'> In-Transit</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Arrived At Destination</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Out For Delivery</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Ready To Pickup</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Delivered</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <i class="fa-solid fa-arrow-down textdanger"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Picked <div class="btn-group dropup">
                                                                    <button type="button" class="btn btndanger">Split dropup</button>
                                                                    <button type="button" class="btn btndanger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="visually-hidden">Toggle Dropdown</span>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item disabled" href="#">Disabled action</a>
                                                                        <h6 class="dropdown-header">Section header</h6>
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="#">After divider action</a>
                                                                    </div>
                                                                </div></span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;
                                    case '9':
                                    ?>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start text-light shadow bg-danger">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Unsuccessfull Delivery</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        break;

                                    default:
                                    ?>
                                        <div class="col-11 mt-1">
                                            <div class="row justify-content-between text-light align-items-center">
                                                <div class="col-1 bgdanger" style="height: 55px; display:flex; align-items: center; justify-content:center; font-size: 20px; width: 8% !important;">
                                                    <i class="fa-solid fa-box fa-1x"></i>
                                                </div>
                                                <div class="col-11 text-start  shadow bg-primary">
                                                    <div class="row align-items-center">
                                                        <div class="col-6" style=" display:flex; align-items: center;height: 55px;">
                                                            <span class='badge badge-pill'>Accept By Courier</span>
                                                        </div>
                                                        <div class="col-6 text-end" style="font-size: 12px; display:flex; align-items: center;height: 55px; justify-content: end;">
                                                            <i class="fa-regular fa-clock fa-1x"></i>
                                                            &nbsp; Aug 03, <?php echo $res['date_created'] . ' PM'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        break;
                                }

                                ?>

                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-8 px-5 py-2 text-center bgdanger text-light">
                                <i class="fa-regular fa-times-circle text-light"></i> Not Found
                            </div>
                    <?php
                        }
                    }

                    ?>
                </row>
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