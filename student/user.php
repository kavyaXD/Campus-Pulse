<?php
$title = 'Users';
require '../vendor/autoload.php';
require '../config/db.php';

$qry = "SELECT * FROM users;";
$result = mysqli_query($con, $qry);

ob_start();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card mt-3">
        <div class="card-body p-0">
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
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td class="text-center"><?php echo $row['id'] ?></td>
                  <td><?php echo $row['fname'] ?></td>
                  <td><?php echo $row['mname'] ?></td>
                  <td><?php echo $row['lname'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo isset($row['date_of_birth']) ? $row['date_of_birth'] : 'N/A' ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['phone_number'] ?></td>
                  <td><?php echo $row['year_of_study'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>