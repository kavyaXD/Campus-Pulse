<?php
session_start();
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header('location:../login.php');
    exit;
}

$student_id = $_SESSION['user_id'];
$qry = "SELECT * FROM users WHERE id='$student_id';";
$result = mysqli_query($con, $qry);

$title='Student Information';
ob_start();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-striped table-bordered mb-0">
        <thead class="bg-dark text-white text-center">
          <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Year of Study</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id'] ?></td>
              <td><?php echo $row['fname'] ?></td>
              <td><?php echo $row['mname'] ?></td>
              <td><?php echo $row['lname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['date_of_birth'] ?></td>
              <td><?php echo $row['gender'] ?></td>
              <td><?php echo $row['address'] ?></td>
              <td><?php echo $row['phone_number'] ?></td>
              <td><?php echo $row['year_of_study'] ?></td>
              <td class="text-center">
                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
