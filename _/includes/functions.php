<?php
    function safe($safes){
        global $connection;
        $safing=mysqli_real_escape_string($connection,$safes);
        return $safing;
    }
    function confirm_query($result_set){
            if(!$result_set){
                die("Unable to execute query Please Check Query Syntax. :(");
            }
        }
    function find_subject(){
        global $connection;
    
        $query = "select * from subjects where visible=1 order by position asc";
        $subject_set = mysqli_query($connection, $query);
        return $subject_set;
    }
    function find_pages_for_subject($subject_id){
        global $connection;
    
        $query = "select * from pages where visible=1 and subject_id={$subject_id} order by position asc";
        $page_set = mysqli_query($connection,$query);
    
        return $page_set;
    }
    function navigation($subjects, $pages){
        global $subject_set; 
        global $page_set;
        $subject_set = find_subject(); 
        confirm_query($subject_set);
    
        $output="<ul class=\"subjects\">";
    
        while($subject = mysqli_fetch_assoc($subject_set)){
        $output.= "<li";
        if($subject["id"]==$subjects){
        $output.=" class=\"selected\" ";
        }
        $output.= ">" ;// ending of li tag or selected class.
    
        $output.="<a href=\"manage_content.php?subject=";
        $output.= urlencode($subject["id"]);
        $output.="\">"; // ending of <a> tag having url
        $output.= strtoupper($subject["manu_name"]);
        $output.="</a>";
    
        // starting query for the pages 
    
        $page_set = find_pages_for_subject($subject["id"]); 
        confirm_query($page_set);
        $output.="<ul class=\"pages\">";
    
            while($page = mysqli_fetch_assoc($page_set)){
                // Start of Li tag the show selected Element or Contents Pages
                $output.= "<li ";
                if($page["id"]==$pages){
                $output.="class=\"selected\" ";
                }
                $output.= ">";// Closing Li Selected Tag 
                // initating ancqar tag
                $output.="<a href=\"manage_content.php?page="; 
                $output.=urlencode($page["id"]);
                $output.="\">";
                $output.=strtoupper($page["menu_name"]);
                $output.="</a>";
                $output.="</li></ul>";
            } 
               $output.="</li>";
         }
            $output.="</ul>";
            return $output;
    }
    function find_subject_by_id($subject_id_no){
        global $connection;        
        $query = "select * from subjects where id={safe($subject_id_no)} limit 1";
        $subject_i = mysqli_query($connection, $query);
        if($subject = mysqli_fetch_assoc($subject_i)){
            return $subject;
        }else{  
        return NULL;
        }
    }
    function content_manage(){
        global $current_subject;
        global $current_page; 
        if(isset($_GET["subject"])){
        $current_subject = find_subject_by_id($_GET["subject"]);
        $current_page = NULL;
    }elseif (isset($_GET["page"])) {
        $current_subject= NULL;
        $current_page = find_page_by_id($_GET["page"]);
    }else{
        $current_subject = NULL;
        $current_page = NULL;
    }
    }
    function find_page_by_id($page_id_no){
        global $connection;        
        $query = "select * from pages where id={safe($page_id_no)} limit 1";
        $page_i = mysqli_query($connection, $query);
        if($page = mysqli_fetch_assoc($page_i)){
            return $page;
        }else{  
        return NULL;
        }
    }
    function subject_position(){
         $subject_set = find_subject();
         $subject_count = mysqli_num_rows($subject_set);
         for($count=1;$count<=($subject_count+1);$count++){ 
    
         echo "<option value=\"{$count}\">{$count}</option>";
         }
    }
    function redirect_to($place){
        header("Location:{$place}");
        exit;
    }
?>