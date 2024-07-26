<?php
require '../config/db.php';
$title = 'Attendance';

$qry = "SELECT * FROM users where role_id=3;";
$result = mysqli_query($con, $qry);
ob_start();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="attendance_status.php" method="post">
                <div class="col-3 form-group">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control form-control-sm" name="date" placeholder="Date" required>
                </div>
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php session_start();
                        while ($rows = mysqli_fetch_assoc($result)) { ?>
                            <td><?php echo $rows['fname'] . ' ' . $rows['lname']; ?></td>

                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status[<?php echo $rows['id']; ?>]" id="present" value="Present">
                                    <label class="form-check-label" for="male">Present</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status[<?php echo $rows['id']; ?>]" id="absent" value="Absent">
                                    <label class="form-check-label" for="female">Absent</label>
                                </div>
                            </td>
                        <?php } ?>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>