<?php

require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qry = "DELETE FROM `form` WHERE `ID` = $id";
    $result = mysqli_query($con, $qry);

    if ($result) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    mysqli_close($con);

    header("Location: user.php");
    exit();
} else {
    echo "No ID provided";
}
