<?php
ob_start();
session_start();
require '../config/db.php';
$title = "Attendance";
?>
<?php
$id  = $_SESSION['id'];
$date = $_POST['date'];
$date1 = $_POST['date1'];
$qry = "SELECT date,status FROM attendance where user_id = $id and date between '$date' and '$date1' order by date;";
$result = mysqli_query($con, $qry);


?>
Total Attendance:
<?php

$id = $_SESSION['id'];
$sql = "SELECT * FROM attendance where user_id=$id and status='Present' and date between '$date' and '$date1';";
$run = mysqli_query($con, $sql);
$presentdays = mysqli_num_rows($run);
$sql = "SELECT distinct date FROM attendance where user_id = $id and date between '$date' and '$date1'";
$run = mysqli_query($con, $sql);
$totaldays = mysqli_num_rows($run);
$attendance = $presentdays / $totaldays * 100;
echo number_format((float)$attendance, 2) . "%";
?>
<section>
    <table class="table table-stripped table-borderrer">
        <tr>
            <th>Date</th>
            <th>Status</th>

        </tr>
        <?php
        while ($rows = $result->fetch_assoc()) { ?>

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