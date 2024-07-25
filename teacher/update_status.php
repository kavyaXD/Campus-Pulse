<?php
require_once('config/db.php');

if (isset($_POST['user_id']) && isset($_POST['status'])) {
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    $qry = "UPDATE form SET status = $status WHERE ID = $user_id";
    if (mysqli_query($con, $qry)) {
        header("Location: user.php");
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}
?>