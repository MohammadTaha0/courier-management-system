<!-- Content Start -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(2)">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 toggle2">
                <?php
                $sql = mysqli_query($con, "SELECT name,MINUTE(time),Hour(time) FROM `contact` LIMIT 3");
                if (mysqli_num_rows($sql)) {
                    while ($sms = mysqli_fetch_array($sql)) {
                ?>
                        <a href="sms.php" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0"><?php echo $sms['name'] ?> send you a message</h6>
                                    <small> at <?php echo $sms['Hour(time)'].':'.$sms['MINUTE(time)'];
                                    ?></small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                <?php
                    }
                } else {
                }
                ?>
                <a href="sms.php" class="dropdown-item text-center">See all message</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(5)">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex  text-capitalize"><?php echo $_SESSION['auth_user']['firstname'] . ' ' . $_SESSION['auth_user']['lastname']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 toggle5">
                <a href="../logout.php" name="logout" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->