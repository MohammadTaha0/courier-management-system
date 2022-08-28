<?php
session_start();
include '../conn.php';
if (!isset($_SESSION['auth'])) {
    $_SESSION['messege'] = "Login First";
    header("location: ../login.php");
} elseif (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "1") {
        $_SESSION['messege'] = "chall";
        header("location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Courier</title>
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
                            <span>Agent</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(0)"><i class="fa-regular fa-buildings me-2"></i>Branch</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle0">
                                <a href="editbranch.php" class="dropdown-item">Edit Branch</a>
                                <a href="listbranch.php" class="dropdown-item">Your Branch</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" onclick="toggle(4)"><i class="fa-regular fa-box-open me-2"></i>Courier</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle4">
                                <a href="newcourier.php" class="dropdown-item active">Add New</a>
                                <a href="listcourier.php" class="dropdown-item">All Couriers</a>
                            </div>
                        </div>
                        <a href="track.php" class="nav-item nav-link"><i class="fa-regular fa-magnifying-glass-location me-2"></i>Track Courier</a>
                        <a href="report.php" class="nav-item nav-link"><i class="fa-regular fa-square-poll-vertical me-2"></i></i>Report</a>
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->



            <div class="content"><?php include 'navbar.php';
                                } ?>


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 text-center w-100">Add Courier</h5>
                    </div>
                    <div class="container">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-12 mb-3 h5 text-secondary text-decoration-underline">Sender Informtion</div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="sendername">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="sendaddress">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label" id="type">Type</label>
                                        <style>
                                            .typecontainer {
                                                background-color: aqua;
                                                width: 100px;
                                                height: 35px;
                                                /* display: flex; */
                                                overflow: hidden;
                                            }

                                            .typecontainer button {
                                                width: 100% !important;
                                                height: 100% !important;
                                                transition: .5s;
                                            }
                                        </style>

                                        <div>
                                            <select class="form-select" name="type" id="select">
                                                <option value="1" class="opt1">Pickup</option>
                                                <option value="2" class="opt2">Deliver</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Contact #</label>
                                        <input type="text" class="form-control" name="sendcontact">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <select name="email" class="form-select">
                                            <option value="">
                                                Select User Email
                                            </option>
                                            <?php
                                            $emquery = mysqli_query($con, "SELECT email FROM `tbl_register` WHERE `userrole`='2'");
                                            while ($emailfet = mysqli_fetch_array($emquery)) {
                                            ?>
                                                <option value="<?php echo $emailfet['email']; ?>"><?php echo $emailfet['email']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 mb-3 h5 text-secondary text-decoration-underline">Recipient Informtion</div>

                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="recname">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="recaddress">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Contact #</label>
                                        <input type="text" class="form-control" name="reccontact">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Branch Proceessed</label>
                                        <select class="form-select" name="probranch">
                                            <option value="0">Select Branch</option>
                                            <?php
                                            $sql = "SELECT * FROM tbl_branch";
                                            $query = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo  $row['city'] . '/' . $row['state'] . '/' . $row['zip_code'] . '/' . $row['country'] . '/' . $row['date_created']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-12" id="pickup_branch">
                                        <label for="exampleInputEmail1" class="form-label">Pickup Branch</label>
                                        <select class="form-select" name="pickbranch">
                                            <option value="0">Select Branch</option>
                                            <?php
                                            $sql = "SELECT * FROM tbl_branch";
                                            $query = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo  $row['city'] . '/' . $row['state'] . '/' . $row['zip_code'] . '/' . $row['country'] . '/' . $row['date_created']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 my-4">
                                    <h6 class="text-secondary">Parcel Information</h5>
                                        <table class="align-middle">
                                            <thead>
                                                <th>Weight</th>
                                                <th>Height</th>
                                                <th>Lenght</th>
                                                <th>Width</th>
                                                <th>Price</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="weight"></td>
                                                    <td><input type="text" name="height" class="form-control"></td>
                                                    <td><input type="text" name="lenght" class="form-control"></td>
                                                    <td><input type="text" name="width" class="form-control"></td>
                                                    <td><input type="text" name="price" class="form-control" id="ppinp" onkeyup="pprice()"></td>
                                                </tr>
                                                <tr class="text-end">
                                                    <td colspan="4">Total</td>
                                                    <td id="dispplaytd" style="overflow: hidden;">
                                                        <script>
                                                            function pprice() {

                                                                document.getElementById('dispplaytd').innerText = document.getElementById('ppinp').value;
                                                                if (document.getElementById('ppinp').value == "") {
                                                                    document.getElementById('dispplaytd').innerText = '0.00';
                                                                }
                                                            }
                                                        </script>
                                                        0.00
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary mt-3 w-50">Add Courier</button>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $sendername = mysqli_escape_string($con, $_POST['sendername']);
                        $sendaddress = mysqli_escape_string($con, $_POST['sendaddress']);
                        $type = mysqli_escape_string($con, $_POST['type']);
                        $sendcontact = mysqli_escape_string($con, $_POST['sendcontact']);
                        $recname = mysqli_escape_string($con, $_POST['recname']);
                        $recaddress = mysqli_escape_string($con, $_POST['recaddress']);
                        $reccontact = mysqli_escape_string($con, $_POST['reccontact']);
                        $probranch = mysqli_escape_string($con, $_POST['probranch']);
                        $pickbranch = mysqli_escape_string($con, $_POST['pickbranch']);
                        $weight = mysqli_escape_string($con, $_POST['weight']);
                        $height = mysqli_escape_string($con, $_POST['height']);
                        $width = mysqli_escape_string($con, $_POST['width']);
                        $lenght = mysqli_escape_string($con, $_POST['lenght']);
                        $price = mysqli_escape_string($con, $_POST['price']);
                        $email = mysqli_escape_string($con, $_POST['email']);
                        $track = mt_rand(1, 1000000000000);

                        $sql = "INSERT INTO `tbl_courier`(`tracking_number`, `sender_name`, `sender_address`, `sender_contact`, `recipitent_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `lenght`, `price`, `status`, `date_created`,`email`) VALUES('$track','$sendername','$sendaddress','$sendcontact','$recname','$recaddress','$reccontact','$type','$pickbranch','$probranch','$weight','$height','$width','$lenght','$price','0',CURDATE(),'$email')";

                        $query = mysqli_query($con, $sql);
                        if ($query) {
                    ?>
                            <script>
                                window.location.href = "listcourier.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // function hello(e) {
        //     var open = $(e).data("isopen");
        //     if (open)
        //         alert('hello' + $(e).val());

        //     $(e).data("isopen", !open);
        // }
        $(document).ready(function() {
            $('td').attr("class", "p-2 border");
            $('th').attr("class", "p-2 border");
            $("#select").change(function() {
                if ($(this).val() == 1) {
                    $("#pickup_branch").removeClass("d-none")
                } else {
                    $("#pickup_branch").addClass("d-none")
                }
            });

        });
    </script>
</body>

</html>