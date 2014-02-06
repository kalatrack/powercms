<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>
<?php 
    $current_subject = find_subject_by_id($_GET['subject']);
    if(!$current_subject){
        redirect_to("manage_content.php");
    }
    $id = $current_subject['id'];
    $query = "DELETE FROM subjects WHERE id={$id} LIMIT 1";  
    $result = mysqli_query($connection, $query); confirm_query($result);
    
    if($result && mysqli_affected_rows($connection)==1){
         $_SESSION["message"] = "your query is successed ";
         redirect_to("manage_content.php");
    } else{
               $_SESSION["message"] = "your query is failed ";
         redirect_to("manage_content.php?subject={$current_subject['id']}");
    }

?>
