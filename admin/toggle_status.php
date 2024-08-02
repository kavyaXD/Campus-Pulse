<?php
session_start();
require '../config/db.php';

$id = $_POST['id'];
$status = isset($_POST['status']) ? 'active' : 'inactive';

$qry = "UPDATE classes SET status = '$status' WHERE id = '$id'";
mysqli_query($con, $qry);
header('location:index.php');
?>
