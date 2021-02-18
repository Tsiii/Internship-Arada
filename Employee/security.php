<?php

    session_start();

    include("../includes/server.php"); 
 
    $count = 0;
    $result = mysqli_query($db, "SELECT * FROM user WHERE User_Namee= '$_SESSION[username]'  AND  User_Type='EMPLOYEE' ");
    
    $count = mysqli_num_rows($result);
    
    if ($count==0)  {
        
        unset($_SESSION["username"]); 
        unset($_SESSION['usertype'] ); 
        ?>
        <script type="text/javascript">
            window.location="login.php";
        </script> 
        <?php

    }  
     
    elseif (empty($_SESSION['usertype']) || empty($_SESSION['username']) ||$_SESSION['usertype'] !== 'EMPLOYEE' ) {
        
        unset($_SESSION["username"]); 
        unset($_SESSION['usertype'] ); 
        ?>
        <script type="text/javascript">
            window.location="login.php";
        </script> 
        <?php
    }

?>