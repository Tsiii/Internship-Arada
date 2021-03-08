<?php
    include("../../includes/server.php" );    
    session_start();
    
    if(isset($_POST['seenN'])) {
        
        $ticketnumber = $_POST["ticketnumber"]; 

        $check = mysqli_query($db, "SELECT  Notification_IT  FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber'  "); 
        
        $checks = mysqli_fetch_array($check);
        
        echo $checks['Notification_IT']; 

        if (strchr($checks['Notification_IT'],"$_SESSION[username]") == True) { 
            ?> 
                <script type="text/javascript">
                    window.location = "../DisplayRequest.php";
                </script>
                <?php
        }
        elseif (strchr($checks['Notification_IT'],"$_SESSION[username]") == False) { 
          
            if (mysqli_query($db, "UPDATE maintenancerequest SET Notification_IT = CONCAT(Notification_IT,' $_SESSION[username]') WHERE Ticket_Number = $ticketnumber")) {
                ?>
            
                <script type="text/javascript">
                    window.location = "../DisplayRequest.php";
                </script>
                <?php
            } 
        }
    }  
?>