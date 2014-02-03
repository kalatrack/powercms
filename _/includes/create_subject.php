<?php session_start();?>
<?php require_once("session.php");?>
<?php require_once("connections.php");?>
<?php require_once("functions.php");?>

<?php 
if (isset($_POST['submit'])){
    $menu = safe($_POST["menu_name"]);
    $p = (int) $_POST["position"];
    $v = (int) $_POST["visible"];

    $query = "INSERT INTO subjects(";
    $query.=" manu_name, position, visible";
    $query.=") VALUES(";
    $query.=" '{$menu}',{$p},{$v}"; 
    $query.=")";
    $Date = mysqli_query($connection,$query);
   
    if($Date){
        $_SESSION["message"] = "your query is successed ";
        redirect_to("manage_content.php");
    }else{
        $_SESSION["message"] = "query is gonna Failed ";
        redirect_to("manage_content.php?subject=1");
        
    }
  
}else{
    redirect_to("create_subject.php");// this is like a get request 
}
?>




<?php if(isset($connection)){  mysqli_close($connection);} ?>