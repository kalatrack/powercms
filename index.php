<?php require_once("_/includes/connections.php");?>
<?php require_once("_/includes/functions.php");?>
<?php include("_/includes/layout/header.php");?>
<?php content_manage(); ?>

<div id="main">
    <div id="navigation">
      <?php echo navigation($current_subject,  $current_page);?>
    </div>
    <div id="page">
        <h2>Manage Content</h2>
        
        <li><a href="_/includes/manage_content.php">Manage Website Content</a></li>
        <li><a href="admins.php">Manage Admins</a></li>
    </div>
</div>
<?php include("_/includes/layout/footer.php");?>