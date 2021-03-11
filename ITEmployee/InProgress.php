<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 

    
    $ticketnumber = $_GET["ticketnumber"];
?>

<style>
    .list-group-item,
    .list-group-item a:hover{  
        text-decoration: none;
    }
</style>

<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
    <div  style="text-align:center; ">
        <div class="x_panel"  style="text-align:center;" >
            <div class="x_title"> 
                <h2>Inprogress Comment on Request</h2>
            </div> 
        </div>  

            <?php   
                $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number='$ticketnumber' ") ; 

                echo "<table class='table table-bordered'>"; 
                    while($row=mysqli_fetch_array($res)){  
                        
                    echo '<tr> User Name"  <td>'; echo $row["User_Namee"]; echo"</td> </tr>";
                            
                    echo '<tr> Ticket Number" <td>'; echo $row["Ticket_Number"]; echo"</td> </tr>";
                            
                    echo '<tr> Services"   <td>'; echo $row["Services"];  echo"</td> </tr>";
                            
                    echo '<tr> Computer Type"   <td>'; echo $row["Computer_Type"];  echo"</td> </tr>";
                            
                    echo '<tr> Request Description  <td>'; echo $row["Request_Description"]; echo"</td> </tr>";
                            
                    echo '<tr> Request Status" <td>'; echo $row["Request_Status"]; echo"</td> </tr>";
                            
                    echo '<tr> Assigned To"    <td>'; echo $row["Assigned_To"]; echo"</td> </tr>";
                            
                    echo '<tr> Requested Date" <td>'; echo $row["Requested_Date"]; echo"</td> </tr>";
                            
                    echo "<tr>"; echo "<td> <input type='text' name='' id=''>"; echo $row["Requested_Date"]; echo"</td> </tr>";   
                                               
                    }
                echo"</table>";  
            ?>
    </div></div>
        </div>
    </div>
</div>  
 

<?php  
    $res0 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number='$ticketnumber' ");   
    $row2= mysqli_num_rows($res0);    
      
    if ($row2 == 0) {
        echo ' <div class="alert alert-warning " style="margin: auto; max-width: fit-content;">
            <strong style="width:100%;">There Is No New Request That is Not Assigned</strong> 
        </div> ';
    }
    else{    ?> 
        <table class="table table-bordered">
            <thead>
                <th>Ticket Number</th>
                <th>Requester</th>
                <th>Select Technician </th> 
                <th>Option </th> 
            </thead>
            <tbody>
                <?php 
                while($row1 = mysqli_fetch_array($res0)) {  ?>
                     
                    <tr>   
                    <form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" >                  
                        <input type="text" name="ticketnumber1" value="<?php echo $row1["Ticket_Number"] ?>" class="form-control" hidden/> 

                        <td><input type="text" name="ticketnumber13" value="<?php echo $row1["Ticket_Number"]; ?>" class="form-control" placeholder="Ticket Number" disabled/></td>
                        <td><input type="text" name="username" value="<?php echo $row1["User_Namee"]; ?>"class="form-control"  placeholder="User Name" disabled/></td>
                        <td>   
                            <select name="assignto" class="form-control selectpicker">
                                <?php
                                $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                while ($row=mysqli_fetch_array($res)) {
                                    echo "<option  name='assignto' > ";
                                    echo $row["User_Namee"];
                                    echo "</option>";
                                } ?> 
                            </select>  
                        </td> 
                        <td><input type="submit" name="submit2" class="form-control btn btn-primary" value="Assign Request"  /></td>
                        
                </tr>   
                </form><?php 
                }      ?>
            </tbody> 
        </table>  
        <?php
    } 


if(isset($_POST["submit2"])){   
                        
    $ticketnumber2 = $_POST['ticketnumber1'];  

    $res = mysqli_query($db, "SELECT Assigned_To FROM maintenancerequest WHERE Ticket_Number='$_POST[ticketnumber1]' ");
    $row=mysqli_fetch_array($res);
    
    $assigned=$row["Assigned_To"]; 
    
    $all = 'All'; 
    $assignto = $_POST['assignto']; 

    
    if ($assigned !== $all) {
        ?>
        <div class="alert alert-danger " style="margin: auto; max-width: fit-content;">
            <strong style="color:white; width:100%;">This Request is Already Assigned To '<?php echo $assigned ?>'</strong> 
        </div>                          
        <?php
    }
    elseif ($assigned == $all || $assigned != 0 || $assigned != "") {  
        
        $date = date('Y-m-d H:i:s');  

        if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To = '$assignto' , Assigned_Date='$date' WHERE Ticket_Number='$_POST[ticketnumber1]' ")){
            ?>
            <div class="alert alert-success col-lg-6 col-lg-push-0" style="margin: auto;">
                <strong style="color:#8e0505; width:100%;">Ticket Number <i style="color:#e91e63;"><?php echo $ticketnumber2 ?>'</i> Is Assigned To <strong style="color:#e91e63;"><b> '<?php echo $assignto ?>'</b></strong> </strong> 
            </div> 
            <?php
            mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED', Assigned_Date = '$date' WHERE Ticket_Number='$_POST[ticketnumber1]' ");

        }
        else{
            echo("Error description1: " . mysqli_error($db));  
        }
    }
    else{
        echo("Error description1: " . mysqli_error($db)); 
    } 
}  
?>

<?php 

    include('footer.php');   
?>








<?php



/*
    include("../includes/server.php");   
    $ticketnumber = $_GET["ticketnumber"];
    $assignedto = $_GET["assignedto"];
    $services = $_GET["services"];
    $date = date('Y-m-d H:i:s');  

    if( mysqli_query($db, "UPDATE maintenancerequest SET Request_Status='INPROGRESS' WHERE Ticket_Number='$ticketnumber' ")){ 
 

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


    */
    ?>
