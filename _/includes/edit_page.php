<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php content_manage(); ?>
<?php if(!$current_page){
     redirect_to("manage_content.php");
}
?>
<?php include("layout/header.php");?>
<div id="main">
    <div id="navigation">
        <?php echo navigation($current_subject,  $current_page);?>
    </div>
    <div id="page">

<?php 
if (isset($_POST['submit'])){
     $id = $current_page['id'];
    $menu = safe($_POST["menu_name"]);
    $p = (int) $_POST["position"];
    $v = (int) $_POST["visible"];
    $content = safe($_POST["content"]);

    $query =" UPDATE pages SET menu_name='{$menu}', position='{$p}', visible='{$v}', content='{$content}' WHERE id={$id} LIMIT 1";
    $Date = mysqli_query($connection,$query); confirm_query($connection, $Date);
     $_SESSION["message"] = "query is gonna Failed ";
        $_SESSION["message"] .= $id."<br>";
        $_SESSION["message"] .=$menu."  ".$p."  <br> ";
    if($Date && mysqli_affected_rows($connection)>=0){
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

        <h2>Edit Subject:<b><?php echo $current_page['menu_name']?></b></h2>
        <form action="edit_page.php?page=<?php echo $current_page['id'];?>" method="post">
            <p>Subject Name:
                <input type="text" name="menu_name" value="<?php echo $current_page['menu_name'];?>">
            </p>
            <p>Position:
                <select name="position">
                    <?php
                       pages_position();
                    ?>

                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="1" <?php if($current_page['visible'] == 1){ echo "checked";}?>>Yes
                <input type="radio" name="visible" value="0" <?php if($current_page['visible'] == 0){ echo "checked";}?>>No
            </p>
            <p>
                Content:<br>
                <textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page['content']);?></textarea>
            </p>
            <input type="submit" name="submit" value="Edit Subject">
        </form>
        <br>
        <a href="manage_content.php" contextmenu="Back To The Manage Content Page">Cancel</a>
        &nbsp;
        &nbsp;
        <a href="delete_page.php?page=<?php echo $current_page['id'];?>">Delete Subject</a>
    </div>
</div>

<?php include("layout/footer.php");?>