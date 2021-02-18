<?php   
    include("security.php");   
  
    include("sidemenu.php"); 
    include("top.php"); 
?>

<div class="container-fluid" style="margin-top:50px; margin-bottom:30px;" > 
    <div class="row">      
        <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin:0 auto;">    
            <form name="form1" action="" method="post" >
                <table style="margin:0 auto; " id="tohidetoassign">
                    <div class="card-header py-3" style="border-bottom: none;"  id="tohidetoassign">
                        <h3 class=" font-weight-bold text-center "  >View Request</h3>
                    </div>  
                    <tr> 
                        <td> 
                            <input type="text"  class="form-control" name="ticketnumber"  placeholder="ticket number" required=""/></td>
                        </td>  
                        <td>
                            <input type="submit" value="search" name="submit1" class="form-control btn btn-primary">
                        </td> 
                    </tr>
                </table>
            </form>

            <?php
            if(isset($_POST['submit1'])){
                $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'AND User_Namee = '$_SESSION[username]' ");

                $resultCheck = mysqli_num_rows($result);
                $row5 = mysqli_fetch_array($result); 

                if($resultCheck == 0 ){    
                    ?> 
                    <!-- Page Heading -->
                    <h4 class="mb-3 text-danger  text-center" id="tohidetoassign">Wrong Ticket Number</h3>
                            
                    <?php

                } 
                elseif($resultCheck > 0){
                    ?>
                    <style>
                        #tohidetoassign {
                            display: none;
                        }
                    </style>  

                    <?php 

                    $res5 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]' " );
                    while($row5 = mysqli_fetch_array($res5)){ 
                        $username = $row5["User_Namee"]; 
                        $woreda = $row5["Woreda"]; 
                        $assignedto = $row5["Assigned_To"]; 
                        $requeststatus = $row5["Request_Status"]; 
                        $ticketnumber = $row5["Ticket_Number"];
                        $_SESSION["ticketnumber"]=$ticketnumber;
                        $_SESSION["username"]=$username; 
                    } 
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-center ">View Request</h3>
                        </div> 

                        <form>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Ticket Number<input type="text"  value="<?php echo $ticketnumber; ?>" class="form-control" name="enrollment"  placeholder="enrollmentno" disabled/></td>
                                    </tr> 
                                    <tr>
                                        <td>User Name<input type="text"  value="<?php echo $username; ?>" class="form-control" name="studentcontact"  placeholder="studentcontact" required="" disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Woreda<input type="text"  value="<?php echo $woreda; ?>" class="form-control" name="woreda"  placeholder="Woreda" required=""disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Assigned To<input type="text"  value="<?php echo $assignedto; ?>" class="form-control" name="assignedto"  placeholder="Assigned" required=""disabled/></td>
                                    </tr>
                                    <tr>
                                        <td>Request Status<input type="text"  value="<?php echo $requeststatus; ?>" class="form-control" name="requeststatus"  placeholder="Request Status" required=""disabled/></td>
                                    </tr>
                                </tbody>   
                            
                            </table>   
                        </form>   
                    </div>      
                    <div class="text-center" style="margin:0 auto; " >                   
                        <a class="btn btn-success " href="ViewRequest.php">Search Again</a>
                    </div>
                <?php
                }
            } 
            ?> 
        </div> 
    </div>
</div> 
<?php
    include('footer.php');
?>