<?php
$title = 'Edit';

require '../vendor/autoload.php';

require '../config/db.php';

$id = $_GET['id'];
$q = "SELECT * FROM users WHERE ID=$id";
$qr = mysqli_query($con, $q);
$user = mysqli_fetch_assoc($qr);
// print_r($user);
ob_start();

?>

<div class="col-md-10">
    <div class="row">
        <h2>Update</h2>
        <p>Please fill this form to edit an User.</p>
        <form action="update.php" method="get">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $user['ID']; ?>">
            </div>
            <div class="form-group">
                <label for="f_name">First Name:</label>
                <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $user['F_NAME']; ?>">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name:</label>
                <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo $user['L_NAME']; ?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['EMAIL']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $user['PASSWORD']; ?>">
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php echo strtolower($user['GENDER']) == 'male' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female" <?php echo strtolower($user['GENDER']) == 'female' ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="Mobile_NO">Phone Number:</label>
                <input type="text" class="form-control" id="Mobile_NO" name="Mobile_NO" value="<?php echo $user['Mobile_NO']; ?>">
            </div>
            <input type="hidden" name="id1" value="<?php echo $id; ?>">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once __DIR__ . '../layout/app_layout.php';
?>