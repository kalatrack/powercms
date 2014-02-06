<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php
    $current_page = find_page_by_id($_GET['page']);
    if(!$current_page){
        redirect_to("manage_content.php");
    }
    $id = $current_page['id'];
    $query = "DELETE FROM pages WHERE id={$id} LIMIT 1";  
    $result = mysqli_query($connection, $query); confirm_query($result);
    
    if($result && mysqli_affected_rows($connection)==1){
         $_SESSION["message"] = "your query is successed ";
         redirect_to("manage_content.php");
    } else{
               $_SESSION["message"] = "your query is failed ";
         redirect_to("manage_content.php?page={$current_page['id']}");
    }
?>