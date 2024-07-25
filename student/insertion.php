<?php
require '../vendor/autoload.php';

require '../config/db.php';
$title= "Register";
ob_start();
?>

<?php
if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $mobile_no = $_POST['mobile_no'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO form VALUES ('','$f_name','$l_name','$email','$hashedPassword','$gender','$mobile_no','');";

    $query = mysqli_query($con, $sql);
    if ($query) {
        header("Location: user.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<?php
$content = ob_get_clean();
include_once __DIR__ . '../layout/app_layout.php';?>