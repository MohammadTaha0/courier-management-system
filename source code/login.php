<?php
session_start();
if (isset($_SESSION['auth'])) {

    if ($_SESSION['auth_role'] == "2") {
        $_SESSION['message'] = "Already Login";
        header("location: ../index/public/index.php");
    } elseif ($_SESSION['auth_role'] == "0") {
        header("location: index.php");
    }
}

if(isset($_SESSION['error']))
{
    ?>
    <script>alert("<?php echo $_SESSION['error']; ?>");</script>
    <?php
    unset($_SESSION['error']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php include 'link.php' ?>
    <style>
        body {
            background: url("./img/reg_bg.jpg") no-repeat;
            background-size: cover;
            width: 100%;
            /* background: black; */
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif !important;
        }

        body input,
        body select {
            background-color: #c5c5c5 !important;
        }

        .form-check-input:checked {
            background-color: rgb(16, 93, 246) !important;
        }

        .btn {
            opacity: .8 !important;
        }

        .shadow {
            background-color: rgba(250, 250, 250, 0.5) !important;
        }
    </style>
</head>

<body>
    <main>
        <?php include 'header.php'; ?>
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>
        <div class="container_fluid">
            <?php

            if (isset($_SESSION['messege'])) {
            ?>
                <div class="container-fluid mt-3 position-absolute top-0 start-0">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <?php echo $_SESSION['messege']; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
                unset($_SESSION['messege']);
            }
            ?>

            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center" style="height: 100vh !important;">
                    <div class="col-6 shadow bg-light p-5 py-2">
                        <h2 class="h4 py-2 pb-3 w-100 text-primary text-center" style="font-weight: 500;">Login Now</h2>
                        <form method="POST" action="logincode.php" class="text-capitalize py-2">
                            <div class="row justify-content-between mb-4">
                                <div class="col-6">
                                    <label class="form-label">email</label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3 pt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5" name="submit">Login</button>
                                </div>
                            </div>
                            <div class="row justify-content-center pt-3">
                                <div class="col-12 text-center text-lowercase">
                                    <p>Don't have an account ? <a href="./register.php" class="text-primary">register now</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </main>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<script src="./app.js"></script>
<!-- For PDF -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<!-- For Excel  -->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
<!-- end document-->