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
                <a class="nav-link" href="login_form.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Login
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:<br><?php echo $_SESSION['name'];
            if ($_SESSION['role_id']==1) {
                echo "(Admin)";
            }
            if ($_SESSION['role_id']==2) {
                echo "(Teacher)";
            }
            if ($_SESSION['role_id']==3) {
                echo "(Student)";
            }
            ?></div>
        </div>
    </nav>
</div>