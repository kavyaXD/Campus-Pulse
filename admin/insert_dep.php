<?php
session_start();
require_once '../vendor/autoload.php';
require '../config/db.php';
ob_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];



    $qry = "INSERT INTO departments values('','$name');";
    if (mysqli_query($con, $qry)) {
        header('location:department.php');
    }
}

$content = ob_get_clean();
include __DIR__ . 'layout/app_layout.php'
?>