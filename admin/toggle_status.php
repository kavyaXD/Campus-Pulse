<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $department_id = intval($_POST['department_id']);
    $status = isset($_POST['status']) ? 'active' : 'inactive';

    $qry = "UPDATE classes SET status = '$status' WHERE id = $id";
    mysqli_query($con, $qry);

    header("Location: classes.php?department_id=$department_id");
    exit();
}
?>
