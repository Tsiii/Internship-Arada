<?php
    include("../../includes/server.php" );    
    session_start();
    
    if(isset($_POST['seenN'])) {
        
        $ticketnumber = $_POST["ticketnumber"]; 

        $check = mysqli_query($db, "SELECT  Notification_A  FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber'  "); 
        $checks = mysqli_fetch_array($check);

        
        if (mysqli_query($db, "UPDATE maintenancerequest SET Notification_A = 'Seen' WHERE Services = '$infos[Services]' ") ) { 
            ?> 
                <script type="text/javascript">
                    window.location = "../DisplayRequest.php";
                </script>
                <?php
        } 
    }  
?>