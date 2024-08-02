<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_id = $_POST['department_id'];
    $name = $_POST['name'];
    $status = isset($_POST['status']) ? 'active' : 'inactive';

    $qry = "UPDATE classes SET department_id = '$department_id', name = '$name', status = '$status' WHERE id = '$id'";
    mysqli_query($con, $qry);
    header('location:classes.php');
}

$qry = "SELECT * FROM classes WHERE id = '$id'";
$result = mysqli_query($con, $qry);
$class = mysqli_fetch_assoc($result);

// Fetch all departments for the dropdown
$dept_qry = "SELECT * FROM departments;";
$dept_result = mysqli_query($con, $dept_qry);

ob_start();
?>
    <form action="edit_class.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                <?php
                while ($dept = mysqli_fetch_assoc($dept_result)) {
                    $selected = $class['department_id'] == $dept['id'] ? 'selected' : '';
                    echo "<option value='" . $dept['id'] . "' $selected>" . $dept['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $class['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status" <?php echo $class['status'] == 'active' ? 'checked' : ''; ?> data-toggle="toggle" data-on="Active" data-off="Inactive">
        </div>
        <button type="submit" class="btn btn-primary">Update Class</button>
    </form>
<?php
$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>
