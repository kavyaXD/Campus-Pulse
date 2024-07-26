<?php

require '../vendor/autoload.php';
require '../config/db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $year_of_study = $_POST['year_of_study'];

    $sql = "UPDATE `users` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `email`='$email', `date_of_birth`='$date_of_birth', `gender`='$gender', `address`='$address', `phone_number`='$phone_number', `year_of_study`='$year_of_study' WHERE `id`='$id';";

    $res = mysqli_query($con, $sql);
    if ($res) {
        echo "Data Updated Successfully";
        header('location:student/users.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
