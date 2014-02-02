<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php include("layout/header.php");?>
<?php content_manage(); ?>
<div id="main">
    <div id="navigation">
<?php echo navigation($current_subject,  $current_page);?>
        <br>
        <a href="new_subject.php">+ Add a Subject</a>
    </div>
    <div id="manage_content">
        <h2>Manage Content</h2>
        <?php if($current_subject){ ?>
        <b>Manage Subject:</b><br>
        <b>Menu Name:</b><?php echo "<b><i>".strtoupper($current_subject["manu_name"])."</i></b>"; echo " <br>   "; ?>
        <?php }elseif ($current_page){ ?>
        <b>Manage Page</b><br>
        <b>Manu Name:</b><?php echo strtoupper($current_page["menu_name"])."<br>".ucwords($current_page["content"]);  ?>
        <?php }else{ ?>
        Please Selet Page:
        <?php }?>
    </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>