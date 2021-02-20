<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?>         
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="non-printable d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> </h1>
            <a href="#"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="window.print()">
                <i class="fas fa-download fa-sm text-white-50"> </i> Generate Report</a>
        </div>

        <!-- Page Heading -->
        <div class="x_panel" style="text-align:center;" >
            <h1 class="h3" >  display Requests</h1>  
            
            <form name="form1" action="" method="post" id="tohidetoassign">
                <input type="text" name="ticketnumber" placeholder="Enter Ticket Number" required>
                <input type="submit" name="submit1" class="btn btn-primary" value="search Request"> 
            </form>  
        </div> 

        <?php 
        if (isset($_POST['submit1'])) {
            
            $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");
        
            $resultCheck = mysqli_num_rows($result);
            $row5 = mysqli_fetch_array($result); 

            if( $resultCheck == 0 ){
                ?>
                <div class="x_panel" style="text-align:center;" >
                    <h1 class="h3 mb-2 text-danger " > Wrong Ticket Number </h1> <br><br>  
                </div> 
                <?php
            }   
            elseif($resultCheck !== 0){ 

                $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$_POST[ticketnumber]'"); 
                $row=mysqli_fetch_array($res);?>
                <form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" > 
                    <input type="text" name="ticketnumber1" value="<?php echo $row["Ticket_Number"] ?>" class="form-control" hidden/> 
                    <div class="card-body"> 
                        <div class="table-responsive"> 
                            <table class='table table-bordered'> 
                                <thead>  
                                    <th> <?php echo"User Image "; ?> </th>  
                                    <th> <?php echo"Ticket Number"; ?> </th> 
                                    <th> <?php echo"User Name"; ?> </th> 
                                    <th> <?php echo"Woreda"; ?> </th> 
                                    <th> <?php echo"Request Description"; ?> </th> 
                                    <th> <?php echo"Request Status"; ?> </th> 
                                    <th> <?php echo"Assigned To"; ?> </th> 
                                    <th> <?php echo"requested Date"; ?> </th>  
                                    <th> <?php echo"Delete Request"; ?> </th> 
                                    <th> <?php echo"Change "; ?> </th> 
                                    </tr> 
                                </thead> 
                                <tbody>  
                                    <tr> 
                                        <td> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> </td> 
 
                                        <td name=ticketnumber11> <?php echo $row["Ticket_Number"]; ?> </td> 
                                        <td> <?php echo $row["User_Namee"]; ?> </td> 
                                        <td> <?php echo $row["Woreda"]; ?> </td> 
                                        <td> <?php echo $row["Request_Description"]; ?> </td> 
                                        <td> <?php echo $row["Request_Status"]; ?> </td> 
                                        <td>  
                                            <select name="assignto" class="form-control selectpicker px-1" style="min-width: 100px;"> 
                                                <?php
                                                $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                                while($row2=mysqli_fetch_array($res)){
                                                    ?>
                                                    <option  name='assignto'> 
                                                        <?php echo $row2["User_Namee"].' '.'('.$row2["First_Name"].')'; ?>
                                                    </option>  
                                                    <?php
                                                }  
                                                ?>
                                            </select> 
                                        </td>  
                                        <td> <?php echo $row["Requested_Date"]; ?></td> 
                                        <td> <a  class="btn btn-danger" href='delete_request.php?id=<?php echo $row["id"]?>'>Delete </a> </td>  
                                    
                                        <td><input type="submit" name="submit2" class="btn btn-primary" value="Save"> </td>  
                                    </tr> 
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </form> 
                <?php
            }  
            else{
                echo("Error description1: " . mysqli_error($db));  
            }
        }

        if (isset($_POST['submit2'])) { 
 
            $assignto = $_POST['assignto'];
            $date = date('Y-m-d H:i:s'); 
            
            $qty=0;
            $res = mysqli_query($db, "SELECT Assigned_To FROM maintenancerequest WHERE Ticket_Number=' $_POST[ticketnumber1]' ");
             
            if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To = '$assignto' WHERE Ticket_Number='$_POST[ticketnumber1]' ")){

                if(mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED', Assigned_Date = '$date' WHERE Ticket_Number='$_POST[ticketnumber1]' ")){
                    
                    echo '<div h3 mb-2 text-success> Request Is Assigned To  ' .$assignto. '</div> '; 
                    unset($POST); 
                }    
                $res3 = mysqli_query($db,"SELECT * FROM maintenancerequest");
                ?>
        
                <div class="card-body"> 
                    <div class="table-responsive"> 
                        <table class='table table-bordered'> 
                            <thead>  
                                <tr>                 
                                    <th> User Image  </th>
                                    <th> Ticket Number </th>
                                    <th> User Name </th>
                                    <th> Woreda </th>
                                    <th> Services </th>
                                    <th> Computer Type </th> 
                                    <th> Request Description </th>
                                    <th> Request Status </th>
                                    <th> Assigned To </th>
                                    <th> Requested Date </th> 
                                    <th> Delete Request </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while($row3=mysqli_fetch_array($res3)){
                                    
                                    $position=5;  
                                    $readPercent= $row3["Request_Description"];
                                    $reqDesShort = substr($readPercent, 0, $position);
                                    ?>
                                    <tr>  
                                        <td> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> </td> 
                                        
                                        <td> <?php echo $row3["Ticket_Number"]; ?>  </td> 
                                        <td> <?php echo $row3["User_Namee"]; ?>  </td> 
                                        <td> <?php echo $row3["Woreda"];  ?>  </td> 
                                        <td> <?php echo $row3["Services"];  ?>  </td> 
                                        <td> <?php echo $row3["Computer_Type"];  ?>  </td> 
                                        <td> <?php echo $reqDesShort ?>  </td> 
                                        <td> <?php echo $row3["Request_Status"]; ?>  </td> 
                                        <td> <?php echo $row3["Assigned_To"];  ?>  </td>                                                    
                                        <td> <?php echo $row3["Requested_Date"];  ?>  </td> 
                                        <td> <?php ?><a href="delete_request.php?id=<?php echo $row3["id"]?>">Delete Request</a><?php  ?>  </td>  
                                    </tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table> 
                    </div>
                </div> 
                <?php 
            }
            else{
                echo("Error description1: " . mysqli_error($db));   
            } 
        }  
        
        else{   
            $res = mysqli_query($db,"SELECT * FROM maintenancerequest ");
            $row=mysqli_fetch_array($res);
        
            $res2 = mysqli_query($db,"SELECT User_Image FROM user WHERE User_Namee= '$row[User_Namee]' LIMIT 5");
            $row2=mysqli_fetch_array($res2);

            $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee   ");
            ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr> 
                                    <th >User Image  </th>
                                    <th >Ticket Number </th>
                                    <th >User Name </th>
                                    <th >Woreda </th>
                                    <th >Services </th>
                                    <th >Computer Type </th> 
                                    <th >Request Description </th>
                                    <th >Request Status </th>
                                    <th >Assigned To </th>
                                    <th >Requested Date </th> 
                                    <th >Edit </th> 
                                    <th >Delete </th> 
                                </tr>
                            </thead> 
                            <tbody> 
                                <tr>
                                <?php 
                                while ($row = mysqli_fetch_array($data)) { 
                                    
                                    $position=5;  
                                    $readPercent= $row["Request_Description"];
                                    $reqDesShort = substr($readPercent, 0, $position); 
                                    ?>   
                                    
                                    <td><img class="rounded-circle" src="<?php echo $row["User_Image"]; ?>"  alt="" height= "100" width="100"> </td>
                                    <td><?php echo $row["Ticket_Number"]; ?> </td>
                                    <td><?php echo $row["User_Namee"]; ?> </td>
                                    <td><?php echo $row["Woreda"]; ?> </td>
                                    <td><?php echo $row["Services"]; ?> </td>
                                    <td><?php echo $row["Computer_Type"]; ?> </td>
                                    <td><?php echo $reqDesShort; ?> </td>
                                    <td><?php echo $row["Request_Status"]; ?> </td>
                                    <td><?php echo $row["Assigned_To"]; ?> </td>
                                    <td><?php echo $row["Requested_Date"]; ?> </td>  
                                         
                                    <td>
                                        <a class=" btn btn-warning btn-circle" style="margin-left: 15px; margin-right: 25px;" href='EditRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>'> 
                                            <i class="fas fa-edit"></i>
                                        </a> </td>  
                                    <td> 
                                        <a class=" btn btn-danger btn-circle" style="margin-left: 15px; margin-right: 25px;" href='DeleteRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>'>
                                            <i class="fas fa-trash"></i>
                                        </a>  
                                    </td>
                                </tr>   
                                    <?php   
                                }  ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
            <?php 
        } 
        ?> 
    </div>
    <!-- /.container-fluid -->

<?php 
    include('footer.php');    
?>
