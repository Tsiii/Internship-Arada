<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
        <div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
            <div class="x_panel"  style="text-align:center;" >
                <div class="x_title"> 
                    <h2>View a Request</h2> 
                </div>
            </div>

            <div class="x_content" style="margin: 0 auto;" >
                <form name="form1" action="" method="post" >
                    <table style="margin:0 auto; text-align:center; " id="tohidetoassign">
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
                    $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");

                    $resultCheck = mysqli_num_rows($result);
                    $row5 = mysqli_fetch_array($result); 

                    if($resultCheck == 0 ){    
                        echo "Wrong Ticket Number"; 

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
                            //$firstname = $row5["First_Name"];
                            //$lastname = $row5["Last_Name"];
                            $username = $row5["User_Namee"]; 
                            $woreda = $row5["Woreda"]; 
                            $assignedto = $row5["Assigned_To"]; 
                            $requeststatus = $row5["Request_Status"]; 
                            $ticketnumber = $row5["Ticket_Number"];
                            $inprogresscomment = $row5["Inprogress_Comment"];
                            $_SESSION["ticketnumber"]=$ticketnumber;
                            $_SESSION["username"]=$username; 
                        } 
                        ?>

                        <form style="margin: 0  auto;">
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
                                            <td>Comment From Technician<input type="text"  value="<?php echo $inprogresscomment; ?>" class="form-control" name="inprogresscomment"  placeholder=" " required=""disabled/></td>
                                        </tr><?php
                                    }
                                    ?>
                                </tbody>   
                            
                            </table>   
                        </form>  
    
                        <div class="mx-auto" style="margin: 0 auto;" > 
                            <a href="viewrequest.php" class=" btn btn-primary">Search Another Request</a>
                        </div>
                        <?php
                    }
                } 
                ?> 
            </div> 
        </div> 

<?php
    include('footer.php');
?>