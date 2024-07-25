<?php
require_once('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $mobile_no = $_POST['mobile_no'];

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $query = "INSERT INTO users (F_NAME, L_NAME, EMAIL, PASSWORD, GENDER, Mobile_NO) VALUES ('$fname', '$lname', '$email', '$hashedPassword', '$gender', '$mobile_no')";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        header("Location: index.php"); // Redirect to login page after registration
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
