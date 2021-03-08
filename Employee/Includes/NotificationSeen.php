<?php
    include("../../includes/server.php" );    
    session_start();
    
    if(isset($_POST['seenN'])) { 

        $ticketnumber = $_POST["ticketnumber"];
 
        $check = mysqli_query($db, "SELECT  Notification_IT  FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber'  "); 
        $check1 = mysqli_fetch_array($check);
        
        if ($check1['Notification_IT']  == 'Not Seen') { ?> 
            <script type="text/javascript">
                window.location = "../DisplayRequest.php";
            </script>
            <?php

        } 
        elseif ($check1['Notification_IT']  !== 'Not Seen'){
            mysqli_query($db, "UPDATE maintenancerequest SET Notification_E = 'Seen' WHERE Ticket_Number = $ticketnumber"); ?>
           
            <script type="text/javascript">
                window.location = "../DisplayRequest.php";
            </script>
            <?php
        }
    } 
?> 