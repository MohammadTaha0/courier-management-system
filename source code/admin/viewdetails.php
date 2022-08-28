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
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>List Couriers</title>
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
                            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(3)"><i class="fa-regular fa-building-user me-2"></i>Agent</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle3">
                                <a href="newagrnts.php" class="dropdown-item">Add New</a>
                                <a href="listagents.php" class="dropdown-item">All Agents</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" onclick="toggle(4)"><i class="fa-regular fa-box-open me-2"></i>Courier</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle4">
                                <a href="newcourier.php" class="dropdown-item">Add New</a>
                                <a href="listcourier.php" class="dropdown-item active">All Couriers</a>
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
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Couriers</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0 text-center table-hover">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Reference Number</th>
                                    <th scope="col">Sender Name</th>
                                    <th scope="col">Recipient Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `tbl_Courier`";
                                $query = mysqli_query($con, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($res = mysqli_fetch_array($query)) {
                                ?>

                                        <tr>
                                            <td><?php echo $res['id']; ?></td>
                                            <td><?php echo $res['tracking_number']; ?></td>
                                            <td><?php echo $res['sender_name']; ?></td>
                                            <td><?php echo $res['recipitent_name']; ?></td>
                                            <td>
                                                <?php
                                                switch ($res['status']) {
                                                    case '1':
                                                        echo "<span class='badge badge-pill bg-info'> Collected</span>";
                                                        break;
                                                    case '2':
                                                        echo "<span class='badge badge-pill bg-info'> Shipped</span>";
                                                        break;
                                                    case '3':
                                                        echo "<span class='badge badge-pill bg-primary'> In-Transit</span>";
                                                        break;
                                                    case '4':
                                                        echo "<span class='badge badge-pill bg-primary'> Arrived At Destination</span>";
                                                        break;
                                                    case '5':
                                                        echo "<span class='badge badge-pill bg-primary'> Out for Delivery</span>";
                                                        break;
                                                    case '6':
                                                        echo "<span class='badge badge-pill bg-primary'> Ready to Pickup</span>";
                                                        break;
                                                    case '7':
                                                        echo "<span class='badge badge-pill bg-success'>Delivered</span>";
                                                        break;
                                                    case '8':
                                                        echo "<span class='badge badge-pill bg-success'> Picked-up</span>";
                                                        break;
                                                    case '9':
                                                        echo "<span class='badge badge-pill bg-danger'> Unsuccessfull Delivery Attempt</span>";
                                                        break;

                                                    default:
                                                        echo "<span class='badge bg-info'> Item Accepted by Courier</span>";
                                                        break;
                                                }


                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info p-2 m-0 me-0" href="viewdetails.php?id=<?php echo $res['id']; ?>"><i class="fa-solid fa-eye text-light"></i></a>
                                                <a class="btn btn-success p-2 m-0 me-0" href=""><i class="fa-regular fa-edit"></i></a>
                                                <a class="btn btn-danger p-2 m-0 me-0" href="#"><i class="fa-regular fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



 
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <style>
        .pos_container {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, .3);
            position: absolute;
            top: 0%;
            z-index: 99999;
        }

        .pos_container .first-col-12 {
            width: 80%;
            height: auto;
            padding: 20px;
        }
    </style>
    <?php

    $id = $_GET['id'];
    $sel = "SELECT * FROM `tbl_courier` WHERE `id`='$id'";
    $qur = mysqli_query($con, $sel);
    $ftch = mysqli_fetch_assoc($qur);

    ?>
    <div class="container-fluid pos_container">
        <div class="col-12 first-col-12 bg-light">
            <div class="row">
                <div class="col-12 border-start border-4 border-primary mb-3">
                    <div class="callout callout-info">
                        <dl>
                            <dt>Tracking Number:</dt>
                            <dd class="mt-2">
                                <h4><b><?php echo $ftch['tracking_number']; ?></b></h4>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 border-start border-4 border-primary">
                    <div class="callout callout-info">
                        <b class="border-bottom border-primary">Sender Information</b>
                        <dl class="mt-3">
                            <dt>Name:</dt>
                            <dd><?php echo $ftch['sender_name']; ?></dd>
                            <dt>Address:</dt>
                            <dd><?php echo $ftch['sender_address']; ?></dd>
                            <dt>Contact:</dt>
                            <dd><?php echo $ftch['sender_contact']; ?></dd>
                        </dl>
                    </div>
                    <div class="callout callout-info">
                        <b class="border-bottom border-primary">Recipient Information</b>
                        <dl class="mt-3">
                            <dt>Name:</dt>
                            <dd><?php echo $ftch['recipitent_name']; ?></dd>
                            <dt>Address:</dt>
                            <dd><?php echo $ftch['recipient_address']; ?></dd>
                            <dt>Contact:</dt>
                            <dd><?php echo $ftch['recipient_contact']; ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="col-md-6 border-start border-4 border-primary">
                    <div class="callout callout-info">
                        <b class="border-bottom border-primary">Parcel Details</b>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <dl>
                                    <dt>Wight:</dt>
                                    <dd><?php echo $ftch['weight']; ?></dd>
                                    <dt>Height:</dt>
                                    <dd><?php echo $ftch['height']; ?></dd>
                                    <dt>Price:</dt>
                                    <dd><?php echo $ftch['price']; ?></dd>
                                </dl>
                            </div>
                            <div class="col-sm-6">
                                <dl>
                                    <dt>Width:</dt>
                                    <dd><?php echo $ftch['width']; ?></dd>
                                    <dt>length:</dt>
                                    <dd><?php echo $ftch['lenght']; ?></dd>
                                    <dt>Type:</dt>
                                    <dd><?php if ($ftch['type'] == "1") {
                                            echo "Pickup";
                                        } elseif ($ftch['type'] == "2") {
                                            echo "Deliver";
                                        } ?></dd>
                                </dl>
                            </div>
                        </div>
                        <dl>
                            <?php if ($ftch['type'] == "1") { ?>
                                <dt>Branch Accepted the Parcel:</dt>
                                <dd><?php $from_id = $ftch['from_branch_id'];
                                    $branchquery = mysqli_query($con, "SELECT * FROM `tbl_branch` WHERE `id`='$from_id'");
                                    $branchfetch = mysqli_fetch_assoc($branchquery);
                                    echo $branchfetch['address'] . ', ' . $branchfetch['city'] . ', ' . $branchfetch['state'] . ', ' . $branchfetch['zip_code'] . ', ' . $branchfetch['date_created'];
                                    ?></dd>
                                <dt>Nearest Branch to Recipient for Pickup:</dt>
                                <dd><?php $to_id = $ftch['to_branch_id'];
                                    $branchquery = mysqli_query($con, "SELECT * FROM `tbl_branch` WHERE `id`='$to_id'");
                                    $branchfetch = mysqli_fetch_assoc($branchquery);
                                    echo $branchfetch['address'] . ', ' . $branchfetch['city'] . ', ' . $branchfetch['state'] . ', ' . $branchfetch['zip_code'] . ', ' . $branchfetch['date_created'];
                                    ?></dd>
                            <?php
                            }
                            ?>
                            <?php if ($ftch['type'] == "2") { ?>
                                <dt>Nearest Branch to Recipient for Pickup:</dt>
                                <dd><?php $to_id = $ftch['to_branch_id'];
                                    $branchquery = mysqli_query($con, "SELECT * FROM `tbl_branch` WHERE `id`='$to_id'");
                                    $branchfetch = mysqli_fetch_assoc($branchquery);
                                    echo $branchfetch['address'] . ', ' . $branchfetch['city'] . ', ' . $branchfetch['state'] . ', ' . $branchfetch['zip_code'] . ', ' . $branchfetch['date_created'];
                                    ?></dd>
                            <?php
                            }
                            ?>
                            <dt>Status:</dt>
                            <dd>
                                <?php
                                switch ($ftch['status']) {
                                    case '1':
                                        echo "<span class='badge badge-pill bg-info'> Collected</span>";
                                        break;
                                    case '2':
                                        echo "<span class='badge badge-pill bg-info'> Shipped</span>";
                                        break;
                                    case '3':
                                        echo "<span class='badge badge-pill bg-primary'> In-Transit</span>";
                                        break;
                                    case '4':
                                        echo "<span class='badge badge-pill bg-primary'> Arrived At Destination</span>";
                                        break;
                                    case '5':
                                        echo "<span class='badge badge-pill bg-primary'> Out for Delivery</span>";
                                        break;
                                    case '6':
                                        echo "<span class='badge badge-pill bg-primary'> Ready to Pickup</span>";
                                        break;
                                    case '7':
                                        echo "<span class='badge badge-pill bg-success'>Delivered</span>";
                                        break;
                                    case '8':
                                        echo "<span class='badge badge-pill bg-success'> Picked-up</span>";
                                        break;
                                    case '9':
                                        echo "<span class='badge badge-pill bg-danger'> Unsuccessfull Delivery Attempt</span>";
                                        break;

                                    default:
                                        echo "<span class='badge bg-info'> Item Accepted by Courier</span>";
                                        break;
                                }
                                ?>
                                <a href="manage_status.php?id=<?php echo $id; ?>" class="btn badge badge-primary bg-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</a>
                            </dd>

                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-12 text-end">
                <a href="listcourier.php" class="btn btn-secondary">close</a>
            </div>
        </div>
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