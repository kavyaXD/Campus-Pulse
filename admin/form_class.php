<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_id = $_POST['department_id'];
    $name = $_POST['name'];
    $status = isset($_POST['status']) ? 'active' : 'inactive';

    $qry = "INSERT INTO classes (department_id, name, status) VALUES ('$department_id', '$name', '$status')";
    mysqli_query($con, $qry);
    header('location:classes.php');
}

// Fetch all departments for the dropdown
$dept_qry = "SELECT * FROM departments;";
$dept_result = mysqli_query($con, $dept_qry);

ob_start();
?>
    <form action="form_class.php" method="post">
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                <?php
                while ($dept = mysqli_fetch_assoc($dept_result)) {
                    echo "<option value='" . $dept['id'] . "'>" . $dept['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status" data-toggle="toggle" data-on="Active" data-off="Inactive">
        </div>
        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
<?php
$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>
