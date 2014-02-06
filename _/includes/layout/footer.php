   <footer>
                <p><center><b>CopyRight <?php echo date("Y/M/h:m:s")?></b></center></p>
   </footer>
    </body>
</html>

<?php
    if(isset($connection)){

    mysqli_close($connection);
}
?>