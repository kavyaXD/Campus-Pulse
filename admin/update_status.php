<?php
require_once('config/db.php');

if (isset($_POST['user_id']) && isset($_POST['status'])) {
    $user_id = $_POST['id'];
    $status = $_POST['status'];

    $qry = "UPDATE classes SET status = $status WHERE id = $user_id";
    if (mysqli_query($con, $qry)) {
        header("Location: classes.php");
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}
?>