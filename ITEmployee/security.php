<?php

    session_start();

    include("../includes/server.php"); 
     
    if (empty($_SESSION['usertype']) ||$_SESSION['usertype'] !== 'IT EMPLOYEE') {
        
        //unset($_SESSION["username"]); 
        //unset($_SESSION['usertype'] ); 
        ?>
        <script type="text/javascript">
            window.location="login.php";
        </script> 
        <?php
    }

    ?>