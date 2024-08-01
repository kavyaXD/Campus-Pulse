<?php
session_start();
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header('location:../login.php');
    exit;
}

$student_id = $_SESSION['user_id'];
$submitted_assignments = [];

// Fetch all assignments for display
$qry = "SELECT * FROM assignments";
$result = mysqli_query($con, $qry);

// Check which assignments have been submitted by the student
$submission_qry = "SELECT assignment_id FROM submission WHERE user_id = '$student_id'";
$submission_result = mysqli_query($con, $submission_qry);
while ($submission_row = mysqli_fetch_assoc($submission_result)) {
    $submitted_assignments[] = $submission_row['assignment_id'];
}

// Reset result pointer to reuse $result
mysqli_data_seek($result, 0);

ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Assignments</h2>
            <table class="table table-hover table-striped table-bordered mb-0">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Upload File</th>
                        <?php if (empty($submitted_assignments)) { ?>
                            <th>Submit</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <td class="text-center">
                                <?php
                                $due_date = new DateTime($row['due_date']);
                                $current_date = new DateTime();

                                if (in_array($row['id'], $submitted_assignments)) { ?>
                                    Submitted
                                <?php } elseif ($current_date > $due_date) { ?>
                                    Past Due
                                <?php } else { ?>
                                    <form action="submit_assignment.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="assignment_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                            <input type="file" name="file_path" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                <?php } ?>
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
