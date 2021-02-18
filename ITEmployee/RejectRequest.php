<?php       
    include("security.php");   
    include("top.php");   

    $ticketnumber = $_GET["Ticket_Number"]; 
    $date = date('Y-m-d H:i:s');  

    $check=mysqli_query($db, "SELECT Request_Status FROM maintenancerequest WHERE Ticket_Number= $ticketnumber");

    $row = mysqli_fetch_array($check);
    $requeststatus = $row["Request_Status"];  
  
    if($requeststatus =='REJECTED'){
        ?>
        <script type="text/javascript">
            window.location = "DisplayRequest.php";
        </script> 
        <?php  
    }

    elseif($requeststatus == 'MAINTAINED'){ 
        mysqli_query($db, "UPDATE maintenancerequest SET Request_Status='REJECTED', Maintained_Date='$date' WHERE Ticket_Number = $ticketnumber"); 
        
        //WORK ON THIS PART ITS NOT DONE IT DOESN'T UPDATE SERVICE TABLE
        mysqli_query($db, "UPDATE services SET Completed = In_Progress - 1 , Rejected = Rejected + 1 , Quantity = Completed + In_Progress + Rejected ,Total = Completed * Cost WHERE Service_Type='$services' ");
          
        ?>
        <script type="text/javascript">
            window.location = "DisplayRequest.php";
        </script>                            
        <?php
    } 
    else{
        echo mysqli_error($db);
    }
?>

