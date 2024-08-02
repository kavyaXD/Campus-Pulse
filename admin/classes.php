<?php
ob_start();
require '../config/db.php';
$pagetitle="Classes";
?>

    <div class="header d-flex justify-content-between align-items-center">
        <div style="text-align: right;">
            <a href="form_class.php" name= "class"class="btn btn-sm btn-success">Add</a>
        </div>
    </div>
    <?php
    $department_id = $_GET['department_id'];
    $qry = "SELECT * FROM classes WHERE department_id = '$department_id';";
    $result = mysqli_query($con, $qry);
    ?>
    <section>
        <table class="table table-stripped table-borderrer">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td>
                        <a href="edit_class.php ?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>

                        <a href="delete_class.php ?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
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