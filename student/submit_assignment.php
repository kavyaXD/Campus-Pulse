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

    // Ensure the uploads directory exists
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move uploaded file to the uploads directory
    $file_destination = $upload_dir . basename($file_path);
    if (move_uploaded_file($_FILES['file_path']['tmp_name'], $file_destination)) {
        // Insert submission into the database
        $qry = "INSERT INTO submission (assignment_id, user_id, file_path, submission_date) VALUES ('$assignment_id', '$student_id', '$file_destination', '$submission_date')";
        mysqli_query($con, $qry);
        header('location:index.php');
    } else {
        echo "Failed to upload file.";
    }
}

// Fetch all assignments for display
$qry = "SELECT * FROM assignments;";
$assignments = mysqli_query($con, $qry);

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
                        <th>Submit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($assignments)) { 
                        // Check if the student has already submitted this assignment
                        $assignment_id = $row['id'];
                        $student_id = $_SESSION['user_id'];
                        $submission_check = "SELECT * FROM submission WHERE assignment_id = '$assignment_id' AND user_id = '$student_id'";
                        $submission_result = mysqli_query($con, $submission_check);
                        $submitted = mysqli_num_rows($submission_result) > 0;
                    ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <td class="text-center">
                                <?php if ($submitted) { ?>
                                    <span class="text-success">Submitted</span>
                                <?php } else { ?>
                                    <form action="submit_assignment.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="assignment_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                            <input type="file" name="file_path" required>
                                        </div>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </td>
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
