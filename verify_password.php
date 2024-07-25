<?php
ob_start();
session_start();
require 'config/db.php';

if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$email = $_POST['email'];
$pass = $_POST['password'];

$_SESSION['email'] = $email;
$qry = "Select * from users where email='$email';";
$result = mysqli_query($con, $qry);
$total = mysqli_num_rows($result);
if ($total == 1) {
    $row = mysqli_fetch_array($result);
    $hashpass = $row['password'];
    $_SESSION['name'] = $row['fname'];
    $role_id = $row['role_id'];
    $_SESSION['role_id'] = $row['role_id'];
    $verify = password_verify($pass, $hashpass);
    if ($verify) {
        if ($role_id == 1) {
            header('location:admin/index.php');
        }
        if ($verify) {
            if ($role_id == 2) {
                header('location:teacher/index.php');
            }
            if ($role_id == 3) {
                header('location:student/index.php');
            }
        } else {
            $_SESSION["error"] = "Invalid password";
            header('location:login.php');
        }
    } else {
        $_SESSION["error"] = "Invalid username";
        header('location:login.php');
    }
}
