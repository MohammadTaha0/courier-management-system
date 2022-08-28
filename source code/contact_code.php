<?php
session_start();
include 'conn.php';
if(isset($_SESSION['auth']))
{
    if(isset($_POST['send_msg']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $user_id = $_SESSION['auth_user']['id'];
    $sql = mysqli_query($con,"INSERT INTO `contact`(`name`,`email`,`msg`,`user_id`) VALUES('$name','$email','$msg','$user_id')");
    if($sql)
    {
        $_SESSION['contact'] = "We will contact in the shortest time.";
        header("location: index.php");
    }
}
}
else{
    $_SESSION['error'] = "Login First! Then Contact Us";
    header("location: login.php");
}
