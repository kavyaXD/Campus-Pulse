<?php
session_start();
require '../config/db.php';

$title = "Classes";

// Check if a department is selected via URL parameter
$selected_department_id = isset($_GET['department_id']) ? intval($_GET['department_id']) : 0;

// Fetch classes based on selected department
$qry = "SELECT classes.*, departments.name AS department_name 
        FROM classes 
        JOIN departments ON classes.department_id = departments.id";

if ($selected_department_id > 0) {
    $qry .= " WHERE classes.department_id = $selected_department_id";
}

$result = mysqli_query($con, $qry);

ob_start();
?>
<div class="header d-flex justify-content-between align-items-center">
    <div style="text-align: right;">
        <a href="form_class.php" class="btn btn-sm btn-success">Add Class</a>
    </div>
</div>
<section>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department</th>
                <th>Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($rows = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['department_name']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td>
                        <form action="toggle_status.php" method="post" class="status-toggle-form">
                            <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                            <input type="hidden" name="department_id" value="<?php echo $selected_department_id; ?>">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" role="switch" id="statusSwitch<?php echo $rows['id']; ?>" <?php echo $rows['status'] == 'active' ? 'checked' : ''; ?> onchange="this.form.submit()">
                                <label class="form-check-label" for="statusSwitch<?php echo $rows['id']; ?>"><?php echo $rows['status'] == 'active' ? 'Active' : 'Inactive'; ?></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="edit_class.php?id=<?php echo $rows['id']; ?>&department_id=<?php echo $selected_department_id; ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="delete_class.php?id=<?php echo $rows['id']; ?>&department_id=<?php echo $selected_department_id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this class?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
