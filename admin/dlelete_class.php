<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];

$qry = "DELETE FROM classes WHERE id = '$id'";
mysqli_query($con, $qry);
header('location:index.php');
?>
