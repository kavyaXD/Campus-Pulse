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

// Fetch the first department
$dept_qry = "SELECT * FROM departments LIMIT 1;";
$dept_result = mysqli_query($con, $dept_qry);
$dept = mysqli_fetch_assoc($dept_result);

ob_start();
?>
    <form action="form_class.php" method="post">
        <div class="form-group">
            <label for="department_id">Department</label>
            <input type="text" name="department_id" class="form-control" value="<?php echo $dept['name']?>" readonly>
            <input type="hidden" name="department_id" value="<?php echo $dept['id']?>">
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