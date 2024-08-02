<?php
session_start();
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_id = $_POST['department_id'];
    $name = $_POST['name'];
    $status = isset($_POST['status']) ? 'active' : 'inactive';

    $qry = "INSERT INTO classes (department_id, name, status) VALUES ('$department_id', '$name', '$status')";
    mysqli_query($con, $qry);
    header('location:index.php');
}

ob_start();
?>
    <form action="form_class.php" method="post">
        <div class="form-group">
            <label for="department_id">Department ID</label>
            <input type="text" name="department_id" class="form-control" value="deparment_id" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="name" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status">
        </div>
        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
<?php
$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>
