<?php
session_start();
require '../vendor/autoload.php';
require '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header('location:../login.php');
    exit;
}

$id = $_GET['id'];
if ($id != $_SESSION['user_id']) {
    header('location:users.php'); // Redirect if student tries to edit another user's data
    exit;
}

$q = "SELECT * FROM users WHERE id=$id";
$qr = mysqli_query($con, $q);
$user = mysqli_fetch_assoc($qr);
$title = 'Edit';
ob_start();
?>

<div class="col-md-10">
    <div class="row">
        <h2>Update</h2>
        <p>Please fill this form to edit your data.</p>
        <form action="update.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $user['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>">
            </div>
            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $user['mname']; ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>">
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php echo strtolower($user['gender']) == 'male' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female" <?php echo strtolower($user['gender']) == 'female' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>">
            </div>
            <div class="form-group">
                <label for="year_of_study">Year of Study:</label>
                <input type="text" class="form-control" id="year_of_study" name="year_of_study" value="<?php echo $user['year_of_study']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layout/app_layout.php';
?>
