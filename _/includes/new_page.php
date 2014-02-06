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
    $content = safe($_POST["content"]);

    $query = "INSERT INTO pages(";
    $query.=" subject_id, menu_name, position, visible, content";
    $query.=") VALUES(";
    $query.=" {$id},'{$menu}',{$p},{$v},'{$content}'"; 
    $query.=")";
    $Date = mysqli_query($connection,$query);
   
    if($Date){
        $_SESSION["message"] = "your query is successed ";
        redirect_to("manage_content.php");
    }else{
        $_SESSION["message"] = "query is gonna Failed ";
        redirect_to("manage_content.php?subject=1");
    }
        
} else{ }
?>
        <h2>Create Page:</h2>
        <form action="new_page.php?subject=<?php echo $current_subject['id'];?>" method="post">
            <p>Menu Name:
                <input type="text" name="menu_name" value="">
            </p>
            <p>Position:
                <select name="position">
                    <?php
                       page_position();
                    ?>

                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="1">Yes
                &nbsp;
                <input type="radio" name="visible" value="0">No
            </p>
            <p>
                Content:<br>
                <textarea name="content" rows="20" cols="80"></textarea>
            </p>
            <input type="submit" name="submit" value="Create NEw Page">
        </form>
        <br>
        <a href="manage_content.php?subject=<?php echo $current_subject['id'];?>" contextmenu="Back To The Manage Content Page">Cancel</a>
        &nbsp;
        &nbsp;
        <!--<a href="delete_page.php?subject=<?php// echo $current_subject['id'];?>">Delete Subject</a>-->
    </div>
</div>

<?php include("layout/footer.php");?>