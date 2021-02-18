<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin: 0 auto;">  

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center" id="tohidetoassign">View a Request</h1>

        <form name="form1" action="" method="post" id="tohidetoassign" >
            <table style="margin:0 auto; text-align:center; ">
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
                    $firstname = $row5["First_Name"];
                    $lastname = $row5["Last_Name"];
                    $username = $row5["User_Namee"]; 
                    $woreda = $row5["Woreda"]; 
                    $assignedto = $row5["Assigned_To"]; 
                    $requeststatus = $row5["Request_Status"]; 
                    $ticketnumber = $row5["Ticket_Number"];
                    $_SESSION["ticketnumber"]=$ticketnumber;
                    $_SESSION["username"]=$username; 
                } 
                ?> 

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">View a Request</h1>

                <div class="card shadow mb-4" style="margin: auto;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">Result</h6>
                    </div>
            
                    <div class="card-body"> 
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
                                    <?php
                                    if($requeststatus == "INPROGRESS"){?>
                                        
                                        <tr>
                                            <td>Comment From Technician<input type="text"  value="<?php echo $inprogresscomment; ?>" class="form-control" name="inprogresscomment"  placeholder="inprogresscomment" required=""disabled/></td>
                                        </tr><?php
                                    }
                                    ?>
                                </tbody>   
                            </table>   
                        </form>   
                    </div>
                </div> 
                            
                <a href="ViewRequest.php" class="form-control btn btn-primary" > Go Back </a></td> 

                <?php

            }
        } 
        ?>  
    </div>  
</div> 
<!-- /.Begin Page Content -->

<?php
    include('footer.php');
?>