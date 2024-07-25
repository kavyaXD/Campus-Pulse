<?php

require 'vendor/autoload.php';

require 'config/db.php';

if (isset($_GET['update'])) {
    $id = $_GET['id'];
    $f_name = $_GET['f_name'];
    $l_name = $_GET['l_name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $gender = $_GET['gender'];
    $mobile_no = $_GET['Mobile_NO'];
    $id1 = $_GET['id1'];

    $sql = "UPDATE `users` SET `id`='[value-1]',`fname`='[value-2]',`mname`='[value-3]',`lname`='[value-4]',`email`='[value-5]',`password`='[value-6]',`role_id`='[value-7]',`dob`='[value-8]',`gender`='[value-9]',`adress`='[value-10]',`mobile_number`='[value-11]',`year_of_study`='[value-12]' WHERE 1 ID='$id1';";

    $res = mysqli_query($con, $sql);
    if ($res) {
        echo "Data Updated Successfully";
        header('location:user.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>