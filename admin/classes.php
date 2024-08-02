<?php
session_start();
require '../config/db.php';
$pagetitle = "Classes";

// Fetch all classes
$qry = "SELECT * FROM classes;";
$result = mysqli_query($con, $qry);

ob_start();
?>
    <div class="header d-flex justify-content-between align-items-center">
        <div style="text-align: right;">
            <a href="form.php" class="btn btn-sm btn-success">Add Class</a>
        </div>
    </div>
    <section>
        <table class="table table-stripped table-bordered">
            <tr>
                <th>ID</th>
                <th>Department ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['department_id']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td>
                        <form action="toggle_status.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                            <input type="checkbox" name="status" <?php echo $rows['status'] == 'active' ? 'checked' : ''; ?> onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <a href="edit_class.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="delete_class.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this class?');">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
<?php
$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>
