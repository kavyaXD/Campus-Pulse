<?php
$title = 'Add form';
require '../vendor/autoload.php';

require '../config/db.php';
ob_start();
?>
<div class="col-md-10">
    <div class="row">
        <div class="col-12">
            <h2>Register</h2>
            <p>Please fill this form to create a User.</p>
            <form action="insertion.php" method="post">
                <!-- <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id">
                            </div> -->
                <div class="mb-3">
                    <label for="f_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="mb-3">
                    <label for="f_name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname">
                </div>
                <div class="mb-3">
                    <label for="l_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mobile_no" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile_no" name="mobile_no">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '../layout/app_layout.php';
?>