<?php
session_start();
include '../conn.php';
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_register` WHERE `id`='$id'";
$query = mysqli_query($con,$sql);
if($query)
{
    $_SESSION['messege'];
    ?>
    <script>
        window.location.href="listagents.php";
    </script>
    <?php
}

?>