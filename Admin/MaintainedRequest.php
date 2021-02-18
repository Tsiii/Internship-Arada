<?php  
    include("security.php");   
   
    include("sidemenu.php"); 
    include("top.php"); 
?> 

    <div class="container-fluid">   
        <table class="mb-4" style="margin:0 auto; " id="tohidetoassign">
            <div class="card-header py-3" style="border-bottom: none;"  id="tohidetoassign">
                <h3 class=" text-center "  >Maintained Requests</h3>
            </div>  
            <tr> 
            
            <form name="form1" action="" method="post"  >
                <td> 
                    <input type="text" class="form-control" name="ticketnumber"  placeholder="Enter Ticket Number" required=""/></td>
                </td>  
                <td>
                    <input type="submit" value="Search Request" name="submit1" class="form-control btn btn-primary">
                </td>
            </form>
            </tr>
        </table>

        <?php
        $TotalResult = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Request_Status = 'MAINTAINED' ");

        if (isset($_POST['submit1'])) {
                
            $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");
        
            $resultCheck = mysqli_num_rows($result);
            $row5 = mysqli_fetch_array($result); 
                
            $result1= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]' AND Request_Status = 'MAINTAINED' ");

            $resultCheck1 = mysqli_num_rows($result1);
            $row1 = mysqli_fetch_array($result1);  

            if( $resultCheck == 0 ){  
                echo "<div class='text-center text-danger mb-4'>Wrong Ticket Number </div>"; 
                $res = mysqli_query($db,"SELECT * FROM maintenancerequest"); 
            }  

            elseif( $resultCheck1 == 0 ){
                    
                echo "<div class='text-center text-warning'>Request Not Maintained ";
                echo "<a class= 'btn-small btn btn-success' href='MaintainedRequest.php'> < Go BAck</a></div>";
            }

            else{
                $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$_POST[ticketnumber]'");
                ?>
                <div class="table-responsive">
                <form>
                    <table class='table table-bordered'>
                        <tr>
                            <th> User Image </th>
                            <th> Ticket Number </th>
                            <th> User Name </th>
                            <th> Woreda </th>
                            <th> Request Description</th>
                            <th> Request Status </th>
                            <th> Assigned To </th>
                            <th> requested Date </th>
                            <th> Delete Request </th>
                            <th> Change </th>
                        </tr>
                        
                        <?php
                        while($row=mysqli_fetch_array($res)){ ?>
                        
                         <tr>
                            <td>  <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> </td>
                            
                            <td> <?php echo $row["Ticket_Number"]; ?> </td>
                            <td> <?php echo $row["User_Namee"];?> </td>
                            <td> <?php echo $row["Woreda"]; ?> </td>
                            <td> <?php echo $row["Request_Description"] ?></td>
                            <td> <?php echo $row["Request_Status"];?> </td>
                            <td> <select name="assignto" class="form-control selectpicker">
                                    <?php
                                    $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                    while($row2=mysqli_fetch_array($res)){
                                        echo "<option  name='assignto' > ";
                                        echo $row2["User_Namee"];
                                        echo " </option>"; 
                                    }  ?>
                                </select>";  
                             </td>  
                             <td> <?php echo $row["Requested_Date"]; ?> </td> 
                             <td><a href="delete_request.php?id=<?php echo $row["id"]?>">Delete Request</a> 
                            </td> 
                            <?php
                        } ?>
                           <td><input type="submit" name="submit" class="btn btn-primary" value="Save"> </td>
                        </tr>
                     </table>  
            <?php
            } 
        }  
        ?>
                </form> 
        <?php  

        if (isset($_POST['submit'])) {

            echo $row['Ticket_Number'];
            
            $qty=0;
            $res = mysqli_query($db, "SELECT Assigned_To FROM maintenancerequest WHERE Ticket_Number='$row[Ticket_Number]' ");
            
            while($row2=mysqli_fetch_array($res)){
                $qty=$row2["Assigned_To"];
            } 

            if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To = '$assignto' WHERE Ticket_Number='$_POST[ticketnumber]' ")){

                echo ' Request Is Assigned To  ' .$assignto;
                mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED' WHERE Ticket_Number='$_POST[ticketnumber]' ");

                $res3 = mysqli_query($db,"SELECT * FROM maintenancerequest");?>
        
                <table class='table table-bordered'>
                    <tbody>
                        <tr>
                            <th> ID </th>
                            <th> User Image </th> 
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

                         <?php
                        while($row3=mysqli_fetch_array($res3)){ ?>
                            <tr>
                            <td> <?php echo $row3["ID"]; ?></td> 
                            <td> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> </td>
                            <td> <?php echo $row3["Ticket_Number"];?> </td>
                            <td> <?php echo $row3["User_Namee"];?> </td>
                            <td> <?php echo $row3["Woreda"];?> </td>
                            <td> <?php echo $row3["Services"];?> </td>
                            <td> <?php echo $row3["Computer_Type"]; ?> </td>
                            <td> <?php echo $row3["Request_Description"];?> </td>
                            <td> <?php echo $row3["Request_Status"];?> </td>
                            <td> <?php echo $row3["Assigned_To"];?> </td>
                            <td> <?php echo $row3["Requested_Date"]; ?> </td>
                                <td>?><a href="delete_request.php?id=<?php echo $row3["id"]?>">Delete Request</a><?php?> </td>
                        </tr><?php
                        } ?>
                    </tbody>
                </table>
                <?php
            }
            else{
                echo("Error description1: " . mysqli_error($db));   
            }
        } 
        else{ 
            
            $res000= mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Request_Status = 'MAINTAINED' ");
            $res= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee  AND  Request_Status = 'MAINTAINED'   ");
            $dos= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee  AND  Request_Status = 'MAINTAINED'   ");

            ?>

            <!-- Maintained Requests -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Maintained Requests</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr> 
                                    <th> User Image    </th>
                                    <th> Ticket Number </th>
                                    <th> User Name  </th>
                                    <th> Woreda     </th>
                                    <th> Request Description  </th>
                                    <th> Request Status </th> 
                                    <th> Assigned To    </th>
                                    <th> Requested Date </th> 
                                    <th> Maintained Date  </th>  
                                </tr>
                            </thead> 
                            <tbody> 
                                <tr> 
                                <?php
                                while($row=mysqli_fetch_array($dos)){
                                    ?>  
                                    <td> <img src='<?php echo $row["User_Image"]; ?>' height= "100" width="100"></td>
                                    <td> <?php echo $row["Ticket_Number"]; ?> </td>
                                    <td> <?php echo $row["User_Namee"]; ?> </td>
                                    <td> <?php echo $row["Woreda"]; ?> </td> 
                                    <td> <?php echo $row["Request_Description"]; ?> </td>
                                    <td> <?php echo $row["Request_Status"]; ?> </td>
                                    <td> <?php echo $row["Assigned_To"]; ?>   </td>
                                    <td> <?php echo $row["Requested_Date"]; ?> </td>   
                                    <td> <?php echo $row["Maintained_Date"]; ?>                                      
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
        }  ?>   
    </div> 
    <!-- /.container-fluid -->
<?php 
    include('footer.php');    
?> 