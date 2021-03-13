<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 

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
            $res0 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number='$ticketnumber' And Assigned_To = '$_SESSION[username]' ");   
            $row2= mysqli_num_rows($res0);    
            
        if(isset($_POST["submit2"])){   
            
    
            $ticketnumber = $_GET["ticketnumber"];
                                
            $res = mysqli_query($db, "SELECT Inprogress_Comment FROM maintenancerequest WHERE Ticket_Number='$ticketnumber'  And Assigned_To = '$_SESSION[username]' ");
            $row=mysqli_fetch_array($res);
            
            $inprogresscommentnow = $_POST["inprogresscomment"]; 
            
            $empty = 0 ;  
            $inprogresscomment = $row['Inprogress_Comment']; 

            
            if ($row['Inprogress_Comment'] !== '') {
                ?>
                <div class="alert alert-danger " style="margin: auto; max-width: fit-content;">
                    <strong style="color:white; width:100%;">This Request is Already Commented As  <?php echo $inprogresscomment ?> </strong> 
                </div>                          
                <?php
            }
            elseif ($inprogresscomment == 0 || $inprogresscomment == "") {  
                

                if( mysqli_query($db, "UPDATE maintenancerequest SET Inprogress_Comment = '$inprogresscommentnow', Request_Status='INPROGRESS' WHERE Ticket_Number='$ticketnumber' ")){
                    ?>
                    <div class="alert alert-success col-lg-6 col-lg-push-0" style="margin: auto;">
                        <strong style="color:#8e0505; width:100%;">Ticket Number <i style="color:#e91e63;"><?php echo $ticketnumber ?>'</i> Is Commented As <strong style="color:#e91e63;"><b> '<?php echo $inprogresscommentnow ?>'</b></strong> </strong> 
                    </div>  <?php
                     
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
                $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number='$ticketnumber' AND Assigned_To = '$_SESSION[username]' ") ; 

                echo "<table class='table table-bordered col-lg-8 mx-auto'>"; 
                    echo "<tbody>"; 
                        echo '<form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" >';                  

                            $row = mysqli_fetch_array($res) ; 
                                    
                            echo '<tr> <td> User Name <input type="text" name="" class="form-control" id="" value="'; echo $row["User_Namee"]; echo '" disabled>  </td> </tr>';
                                    
                            echo '<tr> <td> Ticket Number  <input type="text" name="ticketnumber" class="form-control" id="" value="'; echo $row["Ticket_Number"]; echo '" disabled> </td> </tr>';
                                    
                            echo '<tr> <td> Services  <input type="text" name="" class="form-control" id="" value="'; echo $row["Services"];  echo '" disabled> </td> </tr>';
                                    
                            echo '<tr> <td> Computer Type  <input type="text" name="" class="form-control" id="" value="'; echo $row["Computer_Type"];  echo '" disabled> </td> </tr>';
                                    
                            echo '<tr> <td> Request Description  <input type="text" name="" class="form-control" id="" value="'; echo $row["Request_Description"]; echo '" disabled> </td> </tr>';
                                    
                            echo '<tr> <td> Request Status  <input type="text" name="inprogress" class="form-control" id="" value="'; echo $row["Request_Status"]; echo '" disabled> </td> </tr>';
                                    
                            echo '<tr> <td> Comment on Inprogress <br> <input name="inprogresscomment" class="form-control"  cols="90" value="'; echo $row["Inprogress_Comment"]; echo '"  ></input>  </td> </tr>';
                            
                            echo '<tr> <td> <input type="submit" name="submit2" class="form-control btn btn-primary" value="Submit Comment"  /></td> </tr>';
                        echo '</form>';
                    echo "<tbody>";  
                echo"</table>";  
            ?>
    </div></div> 
        </div>
    </div>
</div>  
 

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

    /*
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

*/
    ?>
