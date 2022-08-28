<?php
session_start();
include '../conn.php';
$id = $_GET['id'];
$sql = "DELETE FROM `tbl_branch` WHERE `id`='$id'";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['messege'] = true;

?>
    <script>
        window.location.href = "listbranch.php";
    </script>
<?php
}

?>