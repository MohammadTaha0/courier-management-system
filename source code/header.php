<?php
include 'conn.php' 
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo.png" height="45" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="our_service.php">Our Services</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="findus.php">Find Us</a></li>
                <?php
                if (isset($_SESSION['auth'])) {
                ?>
                    <li class="nav-item px-2"><a class="nav-link" href="track.php">Track Yout Packing</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="parceldet.php">Parcel Details</a></li>
                <?php
                }
                ?>
            </ul>
            <a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="contactus.php">Contact Us</a>
            <?php
            if (!isset($_SESSION['auth'])) {
            ?>
                <a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="login.php">Login</a>
                <a class="btn btn-success order-1 order-lg-0 ms-lg-3" href="register.php">Register</a>
            <?php
            } else {
            ?>
                <a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="logout.php">Logout</a>
            <?php
            }
            ?>

        </div>
    </div>
</nav>

<style>
    nav {
        background-color: #FDF1DF !important;
    }
</style>