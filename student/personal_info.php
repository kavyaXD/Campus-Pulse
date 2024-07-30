<?php
ob_start();
require '../config/db.php';
$title = "Personal Info";
?>
<?php
session_start();

$id =$_SESSION['user_id'];
$qry = "SELECT * FROM USERS where id= $id;";
$result = mysqli_query($con, $qry);
$rows = $result->fetch_assoc();
?>
    <section>
        <table class="table table-stripped table-borderrer">
            <tr>
                <th>ID:</th>
                <td><?php echo $rows['id']; ?></td>
            </tr>
            <tr>
                <th>First Name:</th>
                <td><?php echo $rows['fname']; ?></td>
            </tr>
            <tr>
                <th>Middle Name:</th>
                <td><?php echo $rows['mname']; ?></td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><?php echo $rows['lname']; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $rows['email']; ?></td>
            </tr>
            <tr>
                <th>Date of Birth:</th>
                <td><?php echo $rows['date_of_birth']; ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $rows['gender']; ?></td>
            </tr>
            <tr>
                <th>Address:</th>
                <td><?php echo $rows['address']; ?></td>
            </tr>
            <tr>
                <th>Mobile Number:</th>
                <td><?php echo $rows['phone_number']; ?></td>
            </tr>
            <tr>
                <th>Year of Study:</th>
                <td><?php echo $rows['year_of_study']; ?></td>
            </tr>
            <?php
            ?>
        </table>
        <a href="edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
    </section>
<?php

$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>