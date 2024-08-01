<?php
ob_start();
session_start();
require '../config/db.php';
$title = "Attendance";
?>
<?php
$id  = $_SESSION['id'];
$date = $_POST['date'];
$qry = "SELECT date,status FROM attendance where user_id = $id and date='$date';";
$result = mysqli_query($con, $qry);
?>
<section>
    <table class="table table-stripped table-borderrer">
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        while ($rows = $result->fetch_array()) { ?>
            <tr>
                <td><?php echo $rows['date']; ?></td>
                <td><?php echo $rows['status']; ?></td>
            </tr>
        <?php }
        ?>
    </table>
</section>
<?php

$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>