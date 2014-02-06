<?php require_once("_/includes/connections.php");?>
<?php require_once("_/includes/functions.php");?>
<?php include("_/includes/layout/header.php");?>
<?php content_manage(); ?>

<div id="main">
    <div id="navigation">
      <?php echo public_navigation($current_subject,  $current_page);?>
    </div>
    <div id="page">
       <h2>Manage Content</h2>
        <?php if($current_subject){ ?>
        <b>Manage Subject:</b><br>
        <b>Menu Name:</b><?php echo "<b><i>".strtoupper($current_subject["manu_name"])."</i></b>"; echo " <br>   "; ?>
        
        <?php }elseif ($current_page){ ?>
        <b>Content:</b><div class="view-content"><?php echo htmlentities(ucwords($current_page["content"]));?></div>
        <br>
        <?php }else{ ?>
        Please Selet Page:
        <?php }?>
    </div>
</div>
<?php include("_/includes/layout/footer.php");?>