<?php
session_start();
$title = 'Grade Assignments';
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) { // Check if the user is a teacher
    header('location:../login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['marks'] as $submission_id => $marks) {
        $feedback = $_POST['feedback'][$submission_id];
        $qry = "UPDATE submission SET marks = '$marks', feedback = '$feedback' WHERE id = '$submission_id'";
        mysqli_query($con, $qry);
    }
    header('location:grade_assignments.php');
}

// Fetch all submissions
$qry = "SELECT s.id as submission_id, a.title, u.fname, u.lname, s.file_path, s.submission_date, s.marks, s.feedback
        FROM submission s
        JOIN assignments a ON s.assignment_id = a.id
        JOIN users u ON s.user_id = u.id
        ORDER BY s.submission_date DESC";
$result = mysqli_query($con, $qry);

ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Grade Assignments</h2>
            <form action="grade_assignments.php" method="post">
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead class="bg-dark text-white text-center">
                        <tr>
                            <th>Assignment</th>
                            <th>Student Name</th>
                            <th>Submission Date</th>
                            <th>File</th>
                            <th>Marks</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                                <td><?php echo $row['submission_date']; ?></td>
                                <td><a href="uploads/<?php echo $row['file_path']; ?>" target="_blank">View File</a></td>
                                <td>
                                    <input type="number" name="marks[<?php echo $row['submission_id']; ?>]" value="<?php echo $row['marks']; ?>" class="form-control" required>
                                </td>
                                <td>
                                    <textarea name="feedback[<?php echo $row['submission_id']; ?>]" class="form-control" required><?php echo $row['feedback']; ?></textarea>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit Grades</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
