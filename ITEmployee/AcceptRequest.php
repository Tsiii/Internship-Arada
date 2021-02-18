<?php
    include("../includes/server.php");   
    $ticketnumber = $_GET["ticketnumber"];
    $assignedto = $_GET["assignedto"];
    $services = $_GET["services"];
    $date = date('Y-m-d H:i:s');  

    if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To='$assignedto' , Request_Status='ACCEPTED' WHERE Ticket_Number='$ticketnumber' ")){ 
 

        if(mysqli_query($db, "UPDATE services SET In_Progress = In_Progress + 1 , Quantity = Completed + In_Progress + Rejected , Total = Quantity * Cost WHERE Service_Type='$services' ")){ 
 
        ?> 

        <script type="text/javascript">
            window.location = "DisplayRequest.php";
        </script>
        <?php
        
        }else{ ?> 

            <script type="text/javascript">
                window.location = "DisplayRequest.php";
            </script>
            <?php
        }
    }
    
    else{
        echo("Error description1: " . mysqli_error($db));  
    }
    ?>