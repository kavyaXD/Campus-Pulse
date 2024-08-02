<?php
require '../config/db.php';
ob_start();
session_start();
$id = $_GET['id'];
$qry = "SELECT * FROM departments WHERE id=$id;";
$result = mysqli_query($con, $qry);
$dep = mysqli_fetch_assoc($result);
?>

<div class="row">
    <h2>Update</h2>

    <form action="update_dep.php" method="post">
        <div class="form-group">
            <label for="f_name">ID:</label>
            <input type="number" class="form-control" name="id" value="<?php echo $dep['id']; ?>">
        </div>
        <div class="form-group">
            <label for="f_name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $dep['name']; ?>">
        </div>
        <br>
        <input type="hidden" name="id1" value="<?php echo $id; ?>">
        <br>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout/app_layout.php';
?>