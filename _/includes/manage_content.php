<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php include("layout/header.php");?>
<?php content_manage(); ?>
<div id="main">
    <div id="navigation">
        <a href="admins.php"><b>&laquo; Main Menu</b></a>
<?php echo navigation($current_subject,  $current_page);?>
        <br>
        <a href="new_subject.php">+ Add a Subject</a>
    </div>
    <div id="manage_content">
        <?php echo se()?>
        <h2>Manage Content</h2>
        <?php if($current_subject){ ?>
        <b>Manage Subject:</b><br>
        <b>Menu Name:</b><?php echo "<b><i>".strtoupper($current_subject["manu_name"])."</i></b>"; echo " <br>   "; ?>
        <br><b>Position:</b><?php echo $current_subject["position"];?><br>
        <b>Visible:</b><?php echo $current_subject["visible"] ==1 ? 'YES':'NO';?><br>
        <a href="edit_subject.php?subject=<?php echo $current_subject['id']?>">Edit Subject</a>
        <div style ="margin-top: 2em; border-top: 2px solid #000;">
            <h3>Pages in this Subject.</h3>
            <ul>
                <?php
                    $page_status = find_pages_for_subject($current_subject['id']);
                    while($page = mysqli_fetch_assoc($page_status)){
                        echo "<li>";
                        echo "<a href=\"manage_content.php?page={$page['id']}\">";
                        echo htmlentities($page['menu_name']);
                        echo "</a></li>";
                    }
                ?>
            </ul>
        <br>
            <a href="new_page.php?subject=<?php echo urlencode($current_subject['id']);?>">Add a new Page To this Subject</a>
        </div>

       <b>Manu Name:</b><?php echo strtoupper($current_page["menu_name"])."<br>";  ?>
  


        <?php }elseif ($current_page){ ?>
        <b>Manage Page</b><br>
        <b>Position:</b><?php echo $current_page["position"];?><br>
        <b>Visible:</b><?php echo $current_page["visible"] ==1 ? 'YES':'NO';?><br>
        <b>Manu Name:</b><?php echo strtoupper($current_page["menu_name"])."<br>";  ?>
        <b>Content:</b><div class="view-content"><?php echo htmlentities(ucwords($current_page["content"]));?></div>
        <br>
        <a href="edit_page.php?page=<?php echo urlencode($current_page['id'])?>">Edit Page</a>
        <?php }else{ ?>
        Please Selet Page:
        <?php }?>
    </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>