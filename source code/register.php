<?php
session_start();
include './conn.php';
if (isset($_SESSION['auth'])) {

    if ($_SESSION['auth_role'] == "2") {
        header("location: index.php");
    } elseif ($_SESSION['auth_role'] == "0") {
        header("location: ./admin/index.php");
    }
}
?>
<?php

if (isset($_POST['submit'])) {

    $f_name = $_POST['firstname'];
    $l_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $branch = $_POST['branch'];

    // echo '<h1>'.$branch.'</h1>';

    $sql = "INSERT INTO `tbl_register`(`firstname`,`lastname`,`email`,`password`,`userrole`,`branch_id`,`date_created`) VALUES('$f_name','$l_name','$email','$password','2',null,curdate())";

    if ($password === $re_password) {
        $insert = mysqli_query($con, $sql);
        if ($insert) {
            $_SESSION['messege'] = "Data Inserted";
        } else {
            $_SESSION['messege'] = "Data Not Inserted";
        }
    } else {
        $_SESSION['errormessege'] = "Password not match";
    }
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
    <title>Registration Form</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php include 'link.php'; ?>

    <style>
        body {
            /* background: url("./img/reg_bg.jpg") no-repeat; */
            /* background-size: cover; */
            /* width: 100%; */
            /* background: black; */
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif !important;
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
        <section class="py-xxl-10 pb-0" id="home">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="page-wrapper p-t-130 p-b-100 font-poppins">
                <?php

                if (isset($_SESSION['messege'])) {
                ?>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </symbol>
                                </svg>
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        <?php echo $_SESSION['messege']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    session_unset();
                } elseif (isset($_SESSION['errormessege'])) {
                ?>
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </symbol>
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </symbol>
                                </svg>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        <?php echo $_SESSION['errormessege']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    session_unset();
                }

                ?>
                <div class="container">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-6 shadow p-5 py-2 mt-3" id="form-col">
                            <h2 class="h4 py-2 pt-5 pb-3 w-100text-secondary text-center" style="font-weight: 500;">Registration Form</h2>
                            <form method="POST" action="register.php" class="text-capitalize py-2">
                                <div class="row justify-content-between mb-4">
                                    <div class="col-6">
                                        <label class="form-label">first name</label>
                                        <input class="form-control form-quriar-control" type="text" name="firstname" required/>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">last name</label>
                                        <input class="form-control form-quriar-control" type="text" name="lastname" required/>
                                    </div>
                                </div>
                                <div class="row justify-content-between mb-4">
                                    <div class="col-12">
                                        <label class="form-label">email</label>
                                        <input type="email" class="form-control form-quriar-control" name="email" required/>
                                    </div>
                                </div>
                                <div class="row justify-content-between mb-4">
                                    <div class="col-6">
                                        <label class="form-label">password</label>
                                        <input class="form-control form-quriar-control" type="password" name="password" required/>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">confirm password</label>
                                        <input class="form-control form-quriar-control" type="password" name="re_password" required/>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3 pt-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary px-5" name="submit">Submit</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center pt-3">
                                    <div class="col-12 text-center text-lowercase">
                                        <p>Already have an account ? <a href="./login.php" class="text-dark">Login now</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php' ?>
    </main>

    <?php include 'script.php'; ?>

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