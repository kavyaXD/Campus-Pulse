<?php
ob_start();
session_start();
require '../config/db.php';
$title = "Enter Date";
?>

<form action="specific_view.php" method="post">
    <div class="col-md-2">
        <div class="form-group">
            <label for="date">Start Date:</label>
            <input type="date" class="form-control form-control-sm" name="date" placeholder="Date" required>
        </div>
    </div><br>
    <div class="col-md-2">
        <div class="form-group">
            <label for="date">End Date:</label>
            <input type="date" class="form-control form-control-sm" name="date1" placeholder="Date" required>
        </div>
    </div><br>
    <button type="submit" name="submit" class="btn btn-primary">Show</button>
</form>
<?php

$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>