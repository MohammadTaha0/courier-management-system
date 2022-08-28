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
    <title>Quriarbox</title>
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
                        <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" onclick="toggle(0)"><i class="fa-regular fa-buildings me-2"></i>Branch</a>
                            <div class="dropdown-menu bg-transparent border-0 toggle0">
                                <a href="editbranch.php" class="dropdown-item">Edit Branch</a>
                                <a href="listbranch.php" class="dropdown-item">Your Branch</a>
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



            <!-- Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                <?php include 'navbar.php'; ?>
                <!-- Navbar End -->

            <?php
        }

            ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-buildings text-primary h1"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Branches</p>

                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_branch` WHERE `id`='$agent_branch_id'";
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-box-open fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="p-0 m-0 text-seconadry">From Branch Total Couriers </p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `from_branch_id`=$agent_branch_id";
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-users-gear fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="p-0 m-0">To Branch Total Couriers </p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `to_branch_id`=$agent_branch_id";
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-box-circle-check fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Collected</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='1' AND `to_branch_id`='$agent_branch_id'"; // collected = 1
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-truck-ramp-couch fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Shipped</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='2' AND `to_branch_id`='$agent_branch_id'"; // shipped = 2
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-network-wired fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total In-Transit</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='3' AND `to_branch_id`='$agent_branch_id'"; // in-transit = 3
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-map-location-dot fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">At Destination</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='4' AND `to_branch_id`='$agent_branch_id'"; // at destination = 4
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-truck-arrow-right fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Out For Delivery</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='5' AND `to_branch_id`='$agent_branch_id'"; // out for delivery = 5
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-boxes-packing fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ready To Pickup</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='6' AND `to_branch_id`='$agent_branch_id'"; // to pickup = 6
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-box-open-full fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Delivered</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='7' AND `to_branch_id`='$agent_branch_id'"; // deliverrd = 7
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-square-check fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Accept By Courier</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='0' AND `to_branch_id`='$agent_branch_id'"; // accrpt by courier = 0
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-truck-fast fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Picked-Up</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='8' AND `to_branch_id`='$agent_branch_id'"; // total picked-up = 8
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-regular fa-xmark-to-slot fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Unsuccessfull delivery</p>
                                <h6 class="mb-0"><?php
                                                    $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                                    $sql = "SELECT * FROM `tbl_courier` WHERE `status`='9' AND `to_branch_id`='$agent_branch_id'"; // unsuccessfull delivery = 9
                                                    $query = mysqli_query($con, $sql);
                                                    $num = mysqli_num_rows($query);
                                                    echo $num;
                                                    ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">New Couriers (To-Branch)</h6>
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
                                $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                $sql = "SELECT * FROM `tbl_Courier` WHERE `to_branch_id`='$agent_branch_id' ORDER BY `id` DESC";
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
                                                <a class="btn btn-success p-2 m-0 me-0" href="editcourier.php?id=<?php echo $res['id']; ?>"><i class="fa-regular fa-edit"></i></a>
                                                <a class="btn btn-danger p-2 m-0 me-0" href="deletecour.php?id=<?php echo $res['id']; ?>"><i class="fa-regular fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="txt-secondary">No Courier (Related: To-Branch)</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">New Couriers (From-Branch)</h6>
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
                                $agent_branch_id = $_SESSION['auth_user']['branch_id'];
                                $sql = "SELECT * FROM `tbl_Courier` WHERE `from_branch_id`='$agent_branch_id' ORDER BY `id` DESC";
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
                                                <a class="btn btn-success p-2 m-0 me-0" href="editcourier.php?id=<?php echo $res['id']; ?>"><i class="fa-regular fa-edit"></i></a>
                                                <a class="btn btn-danger p-2 m-0 me-0" href="deletecour.php?id=<?php echo $res['id']; ?>"><i class="fa-regular fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="txt-secondary">No Courier (Related: To-Branch)</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
             
            <!-- Footer End -->
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