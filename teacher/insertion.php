<?php
require '../vendor/autoload.php';
require '../config/db.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $year_of_study = $_POST['year_of_study'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users VALUES ('','$fname', '$mname', '$lname', '$email', '$hashedPassword', '$role_id', '$date_of_birth', '$gender', '$address', '$phone_number', '$year_of_study')";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: user.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
