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
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 col-xl-4"><img src="assets/img/illustrations/callback.png" alt="..." />
                        <h5 class="text-danger">REQUEST A CALLBACK</h5>
                        <h2>We will contact in the shortest time.</h2>
                        <p class="text-muted">Monday to Saturday, 9am-9pm.</p>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <form class="row" method="POST" action="contact_code.php">
                            <div class="mb-3">
                                <label class="form-label visually-hidden" for="inputName">Name</label>
                                <input class="form-control form-quriar-control" id="inputName" type="text" placeholder="Name" name="name" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label visually-hidden" for="inputEmail">Another label</label>
                                <input class="form-control form-quriar-control" name="email" id="inputEmail" type="email" placeholder="Email" required />
                            </div>
                            <div class="mb-5">
                                <label class="form-label visually-hidden" for="validationTextarea">Message</label>
                                <textarea class="form-control form-quriar-control is-invalid border-400" id="validationTextarea" placeholder="Message (max lenght 100)" name="msg" style="height: 150px" required="required" maxlength="100"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit" name="send_msg">Send Message<i class="fas fa-paper-plane ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['contact'])) {
            ?>
                <script>
                    alert("<?php echo $_SESSION['contact'] ?>")
                </script>
            <?php
                unset($_SESSION['contact']);
            }
            ?>
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