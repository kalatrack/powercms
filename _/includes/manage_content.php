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
<?php  $subject_set = find_subject(); confirm_query($subject_set);?>
<div id="main">
    <div id="navigation">
        <ul class="subjects">
<?php   while($subject = mysqli_fetch_assoc($subject_set)){ ?>
<?php 
echo "<li";
if($subject["id"]==$subject_ids){
echo ' class="selected"';
}
echo " >" ;
?>
                <a href="manage_content.php?subject=<?php echo urlencode($subject["id"]);?>"><?php echo $subject["manu_name"] . "(" . $subject["id"].")" ;?></a>
<?php $page_set = find_pages_for_subject($subject["id"]); confirm_query($page_set); ?>
                <ul class="pages">
<?php while($page = mysqli_fetch_assoc($page_set)){ ?>
<?php 
echo "<li ";
if($page["id"]==$page_ids){
echo 'class="selected"';
}
echo " >" ;
?>
<a href="manage_content.php?page=<?php echo urlencode($page["id"]);?>"><?php echo $page["menu_name"];?></a></li>
                </ul>
        <?php } ?>
            </li>
<?php }?>
        </ul>
    </div>
        <div id="page">
            <h2>Manage Content</h2>
                <?php echo $subject_ids;?><br>
                <?php echo $page_ids;?>
                <p>Welcome to our content management system</p>
                    <ul>
                        <li><a href="manage_content.php">Manage Website Content</a></li>
                        <li><a href="../../admins.php">Manage Admins</a></li>
                    </ul>
        </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>