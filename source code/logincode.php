<?php
include './conn.php';
session_start();


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `tbl_register` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1";
    $select = mysqli_query($con, $sql);
    $row = mysqli_num_rows($select);
    if ($row = mysqli_num_rows($select) > 0) {

        foreach ($select as $data) {
            $user_id = $data['id'];
            $user_first_name = $data['firstname'];
            $user_last_name = $data['lastname'];
            $user_email = $data['email'];
            $user_password = $data['password'];
            $user_role = $data['userrole'];
            $branch_id = $data['branch_id'];
            $date_created = $data['date_created'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_role";
        $_SESSION['auth_user'] = [
            'id' => $user_id,
            'firstname' => $user_first_name,
            'lastname' => $user_last_name,
            'email' => $user_email,
            'password' => $user_password,
            'userrole' => $user_role,
            'branch_id' => $branch_id,
            'date_created' => $date_created,
        ];
        if ($_SESSION['auth_role'] == "0") {
            $_SESSION['message'] = "Welcome To Dashboard";
            header("location: admin/index.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == "2") {
            $_SESSION['message'] = "Welcome to Quriarbox";
            header("location: index.php");
            exit(0);
        }
        elseif ($_SESSION['auth_role'] == "1") {
            $_SESSION['message'] = "Welcome to Agent Dashboard";
            header("location: agent/index.php");
            exit(0);
        }
    } else {
        $_SESSION['error'] = "Invalid Email Or Password";
        header("location: login.php");

    }
}
