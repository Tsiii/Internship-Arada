<?php

    session_start();

    include("/includes/server.php"); 
     
    if (empty($_SESSION['usertype']) ) {
        
        //unset($_SESSION["username"]); 
        //unset($_SESSION['usertype'] ); 
        ?>
        <script type="text/javascript">
            window.location="index.php";
        </script> 
        <?php
    }

    ?>