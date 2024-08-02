<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = isset($_POST['status']) && $_POST['status'] == 'on' ? 'active' : 'inactive';

    $qry = "UPDATE classes SET status = '$status' WHERE id = '$id'";
    mysqli_query($con, $qry);
}

header('location:classes.php');
?>
