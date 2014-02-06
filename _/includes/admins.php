<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php include("layout/header.php");?>
<?php content_manage(); ?>
        <div id="main">
            <div id="navigation">
              <?php echo navigation($current_subject,  $current_page);?>
            </div>
            <div id="page">
                <h2>Admin Menu</h2>
                <p>Welcome to admin area ..</p>
                <ul>
                    <li><a href="manage_content.php">Manage Website Content</a></li>
                    <li><a href="admin_login.php">Manage Admins</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>