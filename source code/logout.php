<?php
session_start();
include 'conn.php';
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);

    $_SESSION['messege'] = "Logged Out Successfully";
    header("location: login.php");

?>