<?php       
    include("security.php");   
    include("top.php");  

    $ticketnumber = $_GET["ticketnumber"]; 
    $date = date('Y-m-d H:i:s'); 
     
    $check=mysqli_query($db, "SELECT Request_Status FROM maintenancerequest WHERE Ticket_Number = $ticketnumber");

    $row = mysqli_fetch_array($check);
    $requeststatus = $row["Request_Status"];  
  
    if($requeststatus=='MAINTAINED'){
        ?>
        <script type="text/javascript">
            window.location = "DisplayRequest.php";
        </script> 
        <?php  
    }
    elseif($requeststatus == 'REJECTED'){
        mysqli_query($db, "UPDATE maintenancerequest SET Request_Status='MAINTAINED' , Maintained_Date='$date' WHERE Ticket_Number = $ticketnumber");
        
        mysqli_query($db, "UPDATE services SET Rejected = Rejected - 1 , Completed = Completed + 1 , Total = Quantity * Cost WHERE Service_Type='$services' ");
        ?>
        <script type="text/javascript">
            window.location = "DisplayRequest.php";
        </script>                            
    <?php 
    } 
    elseif( mysqli_query($db, "UPDATE maintenancerequest SET Request_Status='MAINTAINED' , Maintained_Date='$date' WHERE Ticket_Number='$ticketnumber' ")){ 
        echo "Request Maintained";

        //WORK ON THIS PART ITS NOT DONE IT DOESN'T UPDATE SERVICE TABLE
        if(mysqli_query($db, "UPDATE services SET In_Progress = In_Progress + 1 , Quantity = Completed + In_Progress + Rejected , Total = Quantity * Cost WHERE Service_Type='$services' ")){ 
            echo "Request Accepted";
        ?> 

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

