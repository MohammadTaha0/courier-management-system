<?php
session_start();
include '../conn.php';
if (!isset($_SESSION['auth'])) {
    $_SESSION['messege'] = "Login First";
header("location: ../login.php");
} elseif (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "0") {
        $_SESSION['messege'] = "chall";
        header("location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Agent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php

        if (isset($_SESSION['auth_user'])) {

        ?>




            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="index.php" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa-light fa-box-open me-2"></i> Quriarbox</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-capitalize"><?php echo $_SESSION['auth_user']['firstname'] . ' ' . $_SESSION['auth_user']['lastname']; ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(0)"><i class="fa-regular fa-buildings me-2"></i>Branch</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle0">
                                <a href="newbranch.php" class="dropdown-item">Add New</a>
                                <a href="listbranch.php" class="dropdown-item">All Branches</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" onclick="toggle(3)"><i class="fa-regular fa-building-user me-2"></i>Agent</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle3">
                                <a href="newagrnts.php" class="dropdown-item active">Add New</a>
                                <a href="listagents.php" class="dropdown-item">All Agents</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(4)"><i class="fa-regular fa-box-open me-2"></i>Courier</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle4">
                                <a href="newcourier.php" class="dropdown-item">Add New</a>
                                <a href="listcourier.php" class="dropdown-item">All Couriers</a>
                            </div>
                        </div>
                        <a href="track.php" class="nav-item nav-link"><i class="fa-regular fa-magnifying-glass-location me-2"></i>Track Courier</a>
                        <a href="report.php" class="nav-item nav-link"><i class="fa-regular fa-square-poll-vertical me-2"></i></i>Report</a>
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->



             <div class="content"><?php include 'navbar.php'; } ?>


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Update Agent</h6>
                    </div>
                    <div class="container">
                        <?php 
                        $id = $_GET['id'];
                        $select = "SELECT * FROM `tbl_register` WHERE `id`='$id'";
                        $selectquery = mysqli_query($con,$select);
                        $fetch = mysqli_fetch_assoc($selectquery);

                        ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $fetch['firstname']; ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $fetch['lastname']; ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Branch</label>
                                    <select class="form-select" name="branch">
                                        <option value="0">Select Branch</option>
                                        <?php
                                        $sql = "SELECT * FROM tbl_branch";
                                        $query = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                                <option <?php if($row['id'] == $fetch['branch_id']){?> selected <?php } ?> value="<?php echo $row['id']; ?>"><?php echo  $row['city'] . '/' . $row['state'] . '/' . $row['zip_code'] . '/' . $row['country'] . '/' . $row['date_created']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $fetch['email']; ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="<?php echo $fetch['password']; ?>">
                                </div>
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Update agent</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_GET['id'];
                        $firstname = mysqli_escape_string($con, $_POST['firstname']);
                        $lastname = mysqli_escape_string($con, $_POST['lastname']);
                        $branch = mysqli_escape_string($con, $_POST['branch']);
                        $email = mysqli_escape_string($con, $_POST['email']);
                        $password = mysqli_escape_string($con, $_POST['password']);

                        $sql = "UPDATE `tbl_register` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`branch_id`='$branch' WHERE `id`='$id'";

                        $query = mysqli_query($con, $sql);
                        if ($query) {
                    ?>
                            <script>
                                window.location.href = "listagents.php";
                            </script>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <!-- Recent Sales End -->

 
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>