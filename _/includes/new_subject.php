<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php include("layout/header.php");?>
<?php content_manage(); ?>
<div id="main">
    <div id="navigation">
        <?php echo navigation($current_subject,  $current_page);?>
    </div>
    <div id="page">
        <h2>Create Subject</h2>
        <form action="create_subject.php" method="post">
            <p>Subject Name:
                <input type="text" name="menu_name" value="">
            </p>
            <p>Position:
                <select name="position">
                    <?php
                       subject_position();
                    ?>

                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="1" class="active">Yes
                <input type="radio" name="visible" value="0">No
            </p>
            <input type="submit" name="submit" value="Create Subject">
        </form>
        <br>
        <a href="manage_content.php" contextmenu="Back To The Manage Content Page">Cancel</a>
    </div>
</div>
<?php mysqli_free_result($subject_set);?>
<?php include("layout/footer.php");?>