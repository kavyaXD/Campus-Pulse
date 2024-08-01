<?php
ob_start();
session_start();
require '../config/db.php';
$title = "Enter Date";
?>

<form action="daily_view.php" method="post">
    <div class="col-md-2">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control form-control-sm" name="date" placeholder="Date" required>
        </div>
    </div><br>
    <button type="submit" name="submit" class="btn btn-primary">Show</button>
</form>
<?php

$content = ob_get_clean();

include_once __DIR__ . '/../layout/app_layout.php';
?>