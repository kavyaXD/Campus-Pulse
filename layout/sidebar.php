<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="user.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    User
                </a>
                <?php if ($_SESSION['role_id'] == 1) { ?>
                    <a class="nav-link" href="department.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Departments
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 1) { ?>
                    <a class="nav-link" href="classes.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Classes
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 2) { ?>
                    <a class="nav-link" href="create_assginment.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Create Assignment
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 2) { ?>
                    <a class="nav-link" href="grade_assIgnment.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Grade Assignment
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 3) { ?>
                    <a class="nav-link" href="personal_info.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Personal Info
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 3) { ?>
                    <a class="nav-link" href="submit_assignment.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Submit Assignment
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] != 3) { ?>
                    <a class="nav-link" href="attendance.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Attendance
                    </a>
                <?php } ?>
                <?php if ($_SESSION['role_id'] == 3) { ?>
                    <a class="nav-link" href="attendance_report.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Attendance Status
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:<br>
                <?php echo $_SESSION['name'];
                if ($_SESSION['role_id'] == 1) {
                    echo "(Admin)";
                }
                if ($_SESSION['role_id'] == 2) {
                    echo "(Teacher)";
                }
                if ($_SESSION['role_id'] == 3) {
                    echo "(Student)";
                }
                ?></div>
        </div>
    </nav>
</div>