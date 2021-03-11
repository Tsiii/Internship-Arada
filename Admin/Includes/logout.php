<?php
    include("../../includes/server.php");  
    session_start();
    
    unset($_SESSION["username"]); 

    unset($_SESSION["usertype"]); 
    unset($_SESSION["status"]); 
    unset($_SESSION["image"]); 
?>
    <script type="text/javascript">
        window.location="../../login.php"; 
    </script>