<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php include("layout/header.php");?>
<?php
    if(isset($_GET["subject"])){
        $subject_ids = $_GET["subject"];
        $page_ids = null;
    }elseif (isset($_GET["page"])) {
        $subject_ids = null;
        $page_ids = $_GET["page"];
    }else{
        $subject_ids = null;
        $page_ids = null;
    }
?>
<div id="main">
    <div id="navigation">
        <?php echo navigation($subject_ids, $page_ids);?>
    </div>
    <div id="manage_content">
        <h2>Manage Content</h2>
        <?php if($subject_ids){ ?>
        <b>Manage Subject:</b><br>
        <?php $current_subject = find_subject_by_id($subject_ids);?>
        <b>Menu Name:</b><?php echo "<b><i>".strtoupper($current_subject["manu_name"])."</i></b>"; echo " <br>   ".$current_subject["time_stamp"]; ?>
        <?php }elseif ($page_ids){ ?>
        <?php $current_page= find_page_by_id($page_ids);?>
        <b>Manage Page</b><br>

        <b>Manu Name:</b><?php echo strtoupper($current_page["menu_name"])."<br>".ucwords($current_page["content"]);  ?>
        <?php }else{ ?>
        Please Selet Page:
        <?php }?>
    </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>