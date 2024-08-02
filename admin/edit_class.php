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
    header('location:index.php');
}

$qry = "SELECT * FROM classes WHERE id = '$id'";
$result = mysqli_query($con, $qry);
$class = mysqli_fetch_assoc($result);

ob_start();
?>
    <form action="edit_class.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="department_id">Department ID</label>
            <input type="text" name="department_id" class="form-control" value="<?php echo $class['department_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $class['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status" <?php echo $class['status'] == 'active' ? 'checked' : ''; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Update Class</button>
    </form>
<?php
$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>
