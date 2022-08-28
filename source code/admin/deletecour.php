<?php
include '../conn.php';
session_start();
$delid = $_GET['id'];
$sql2 = "DELETE FROM `tbl_courier` WHERE `id`='$delid'";
$query2 = mysqli_query($con,$sql2);
header("location: listcourier.php");
?>