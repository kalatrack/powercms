<?php require_once("_/includes/connections.php");?>
<?php require_once("_/includes/functions.php");?>
<?php include("_/includes/layout/header.php");?>
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
<?php 
    navigation($subject_ids, $page_ids);
?>
    </div>
        <div id="page">
            <h2>Manage Content</h2>
                <?php echo $subject_ids;?><br>
                <?php echo $page_ids;?>
                        <li><a href="_/includes/manage_content.php">Manage Website Content</a></li>
                        <li><a href="admins.php">Manage Admins</a></li>
                    </ul>
        </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("_/includes/layout/footer.php");?>