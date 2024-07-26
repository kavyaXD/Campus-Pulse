<?php
require 'config/db.php';
$title = 'Attendance';
ob_start();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . 'layout/app_layout.php';
?>