<?php
session_start();
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header('location:../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assignment_id = $_POST['assignment_id'];
    $student_id = $_SESSION['user_id'];
    $file_path = $_FILES['file_path']['name'];
    $submission_date = date('Y-m-d');

    // Upload file
    move_uploaded_file($_FILES['file_path']['tmp_name'], "uploads/$file_path");

    $qry = "INSERT INTO submission (assignment_id, user_id, file_path, submission_date) VALUES ('$assignment_id', '$student_id', '$file_path', '$submission_date')";
    mysqli_query($con, $qry);
    header('location:index.php');
}

ob_start();
?>

<div class="col-md-10">
    <div class="row">
        <h2>Submit Assignment</h2>
        <form action="submit_assignment.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="assignment_id">Assignment ID:</label>
                <input type="number" class="form-control" id="assignment_id" name="assignment_id" required>
            </div>
            <div class="form-group">
                <label for="file_path">Upload File:</label>
                <input type="file" class="form-control" id="file_path" name="file_path" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Assignment</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
