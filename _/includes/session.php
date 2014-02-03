<?php
        session_start();
    function se(){ 
        if(isset($_SESSION['message'])){
            $output = "<div class=\"msg\">";
            $output.= htmlentities($_SESSION["message"]);
            $output.= "</div>";
            $_SESSION["message"] = NULL;
            return $output;
        }
    }
?>

