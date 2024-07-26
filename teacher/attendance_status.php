<?php
session_start();

require '../config/db.php';
ob_start();
$qry = "SELECT * FROM USERS where role_id=3;";
$result = mysqli_query($con, $qry);

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $data = $_POST['status'];
    foreach ($data as $student_id => $status) {

        echo $student_id;
        echo $status;

        $qry = "INSERT INTO `attendance`( `user_id`, `date`, `status`) VALUES ($student_id,'$date','$status')";
        echo $qry;
        $query = mysqli_query($con, $qry);
        if ($query) {
            header("Location: attendance.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
