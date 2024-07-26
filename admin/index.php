<?php
// if (isset($_SESSION['role_id']) && $_SESSION['role_id']!=1) {
//     # code...
// }

$title = 'Index';
require '../vendor/autoload.php';
require '../config/db.php';
ob_start();
?>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-top-0 border-bottom-0 border-end-0 border-primary shadow-lg p-3 mb-5 bg-primary rounded mb-3 text-white">
                <h5 class="card-title text-center">
                    <br>Total number of Users:
                    <?php
                    $sql = "SELECT * FROM users;";
                    $query = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($query);
                    echo $count;
                    ?>
                    <br><br>
                </h5>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-top-0 border-bottom-0 border-end-0 border-primary shadow-lg p-3 mb-5 bg-warning rounded mb-3 text-white">
                <h5 class="card-title text-center">
                    <br>Active Users:
                    <?php
                    // $sql = "SELECT status FROM users WHERE status='1';";
                    // $run = mysqli_query($con, $sql);
                    // $total = mysqli_num_rows($run);
                    // echo $total;
                    ?>
                    <br><br>
                </h5>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-top-0 border-bottom-0 border-end-0 border-primary shadow-lg p-3 mb-5 bg-success rounded mb-3 text-white">
                <h5 class="card-title text-center">
                    <br>Column 3
                    <br><br>
                </h5>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-top-0 border-bottom-0 border-end-0 border-primary shadow-lg p-3 mb-5 bg-danger rounded mb-3 text-white">
                <h5 class="card-title text-center">
                    <br>Column 4
                    <br><br>
                </h5>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>