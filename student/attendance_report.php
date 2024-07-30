<?php
ob_start();
session_start();
require '../config/db.php';
$title='Attendance ';
$id=$_SESSION['user_id'];
$sql="SELECT * FROM `attendance`where user_id=$id";
$res=mysqli_query($con,$sql);
?>
<section>
    <table class="table table-stripped table-borderrer">
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        while($row=$res->fetch_assoc())
        {?>

        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['status']?></td>

    <?php
}?>
</table>
</section>

<?php
$content=ob_get_clean();
include_once __DIR__.'/../layout/app_layout.php';
?>
