<?php
session_start();
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header('location:../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submission_id = $_POST['submission_id'];
    $marks = $_POST['marks'];
    $feedback = $_POST['feedback'];
    $graded_date = date('Y-m-d');

    $qry = "UPDATE submission SET marks='$marks', feedback='$feedback', submission_date='$graded_date' WHERE id='$submission_id'";
    mysqli_query($con, $qry);
    header('location:index.php');
}

ob_start();
?>

<div class="col-md-10">
    <div class="row">
        <h2>Grade Assignment</h2>
        <form action="grade_assignment.php" method="post">
            <div class="form-group">
                <label for="submission_id">Submission ID:</label>
                <input type="number" class="form-control" id="submission_id" name="submission_id" required>
            </div>
            <div class="form-group">
                <label for="marks">Marks:</label>
                <input type="number" class="form-control" id="marks" name="marks" required>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea class="form-control" id="feedback" name="feedback" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Grade Assignment</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
