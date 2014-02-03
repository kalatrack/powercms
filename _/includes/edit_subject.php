<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php content_manage(); ?>
<?php if(!$current_subject){
     redirect_to("manage_content.php");
 }?>
<?php include("layout/header.php");?>
<div id="main">
    <div id="navigation">
        <?php echo navigation($current_subject,  $current_page);?>
    </div>
    <div id="page">
<?php 
if (isset($_POST['submit'])){//AFRER SUBMITING THE FORM FORM PROCESS WILL STARTUP

    $id = $current_subject['id'];
    $menu = safe($_POST["menu_name"]);
    $p = (int) $_POST["position"];
    $v = (int) $_POST["visible"];

    $query =" UPDATE subjects SET manu_name='{$menu}', position='{$p}', visible='{$v}' WHERE id={$id} LIMIT 1";
    $Date = mysqli_query($connection,$query); confirm_query($connection, $Date);
     $_SESSION["message"] = "query is gonna Failed ";
        $_SESSION["message"] .= $id."<br>";
        $_SESSION["message"] .=$menu."  ".$p."  <br> ";
    if($Date && mysqli_affected_rows($connection)==1){
        $_SESSION["message"] = "your query is successed ";
        redirect_to("manage_content.php");
    }else{
        $_SESSION["message"] = "query is gonna Failed ";
        $_SESSION["message"] .= $id."<br>";
        $_SESSION["message"] .=$menu."  ".$p."  <br> ";

        redirect_to("manage_content.php");
    }
        
} else{ }


?>
        <h2>Edit Subject:<b><?php echo $current_subject['manu_name']?></b></h2>
        <form action="edit_subject.php?subject=<?php echo $current_subject['id'];?>" method="post">
            <p>Subject Name:
                <input type="text" name="menu_name" value="<?php echo $current_subject['manu_name'];?>">
            </p>
            <p>Position:
                <select name="position">
                    <?php
                       selected_position();
                    ?>

                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="1" <?php if($current_subject['visible'] == 1){ echo "checked";}?>>Yes
                <input type="radio" name="visible" value="0" <?php if($current_subject['visible'] == 0){ echo "checked";}?>>No
            </p>
            <input type="submit" name="submit" value="Edit Subject">
        </form>
        <br>
        <a href="manage_content.php" contextmenu="Back To The Manage Content Page">Cancel</a>
    </div>
</div>

<?php include("layout/footer.php");?>