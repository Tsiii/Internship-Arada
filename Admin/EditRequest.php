<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- table edit -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive"> 

                <?php  
                if($ticketnumber = $_GET["ticketnumber"]){  

                    $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber' ");
                    $row=mysqli_fetch_array($res) ;  

                    $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND Ticket_Number = '$row[Ticket_Number]'  ");
                    $row2=mysqli_fetch_array($data) ; 
                    
                    ?>
                    <table class='table table-bordered' id="tohidetoassign">
                        <thead> 
                            <tr> 
                                <th> User Image  </th>
                                <th> ID  </th>
                                <th> Ticket Number </th>
                                <th> User Name </th>
                                <th> Woreda </th>
                                <th> Request Description </th>
                                <th> Request Status </th>
                                <th> Assigned To </th>
                                <th> Requested Date </th>
                                <th> Options </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                    
                                <form action='' method='POST'>
                                    <td> <img src="<?php echo $row2["User_Image"]; ?>" height= "100" width="100"> </td>
                                    <td> <?php echo $row["ID"]; ?> </td>
                                    <td> <?php echo $row["Ticket_Number"]; ?> </td>
                                    <td> <?php echo $row["User_Namee"]; ?> </td>
                                    <td> <?php echo $row["Woreda"]; ?> </td>
                                    <td> <?php echo $row["Request_Description"]; ?> </td>
                                    <td> <?php echo $row["Request_Status"]; ?> </td>
                                    <td> <select name="assignto" class="form-control selectpicker">
                                            <?php
                                            $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                            while($row2=mysqli_fetch_array($res)){
                                                echo "<option  name='assignto' > ";
                                                echo $row2["User_Namee"];
                                                echo " </option>";

                                            }  ?>
                                        </select> 
                                    </td>
                                    <td> <?php echo $row["Requested_Date"]; ?> </td>  
                                    <td> 
                                        <a class="btn btn-danger" href="delete_request.php?id= <?php echo $row["ID"]; ?> ">Delete </a>
                                        <input type="submit" name="saveedit" class="btn btn-primary" value="Save">
                                    </td>
                                </form>
                            </tr> 
                        </tbody>
                    </table> 
                    <?php
                } 
                
                if (isset($_POST['saveedit'])) { 
                    
                    $date = date('Y-m-d H:i:s');  
                    $assignto = mysqli_real_escape_string($db,$_POST['assignto']); 
                     
                    $res = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number='$row[Ticket_Number]' ");
                      
                    if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To = '$assignto' WHERE Ticket_Number='$row[Ticket_Number]' ")){

                        mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED', Assigned_Date = '$date'  WHERE Ticket_Number='$row[Ticket_Number]' ");
                        ?>

                        <div class="col-sm-4 col-md-4 col-lg-6 col-xl-4 text-center text-lg text-gray-100 bg-gradient-success text" style="margin: 0 auto; margin-bottom:10px;"> 
                            Request Is Assigned To  <strong> <?php echo  $assignto; ?> </strong>
                        </div>

                        <style>
                            #tohidetoassign {
                                display: none;
                            }
                        </style>  
    
                        <?php  
                            $res3 = mysqli_query($db,"SELECT * FROM maintenancerequest"); 
                            $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber' ");
                        ?>

                        <table class='table table-bordered'>
                            <tr> 
                                <th> User Image  </th>
                                <th> ID  </th>
                                <th> Ticket Number </th>
                                <th> User Name </th>
                                <th> Woreda </th>
                                <th> Request Description </th>
                                <th> Request Status </th>
                                <th> Assigned To </th>
                                <th> Requested Date </th> 
                            </tr>

                            <?php $row=mysqli_fetch_array($res) ;  ?> 

                            <tr>                    
                                <form action='' method='POST'>
                                    <td name= ""> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> </td>
                                    <td name= ""> <?php echo $row["ID"]; ?> </td>
                                    <td name= ""> <?php echo $row["Ticket_Number"]; ?> </td>
                                    <td name= ""> <?php echo $row["User_Namee"]; ?> </td>
                                    <td name= ""> <?php echo $row["Woreda"]; ?> </td>
                                    <td name= ""> <?php echo $row["Request_Description"]; ?> </td>
                                    <td name= ""> <?php echo $row["Request_Status"]; ?> </td>
                                    <td><select name="assignto" class="form-control selectpicker">
                                            <?php
                                            $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                            while($row2=mysqli_fetch_array($res)){
                                                echo "<option  name='assignto' > ";
                                                echo $row2["User_Namee"];
                                                echo " </option>";

                                            }  ?>
                                        </select> 
                                    </td>
                                    <td> <?php echo $row["Requested_Date"]; ?> </td>  
                                </form>
                            </tr> 
                        </table> 
                        <?php 
                    }
                    else{
                        echo("Error description1: " . mysqli_error($db));   
                    }
                }   
                ?>   
            </div> 
        </div> 
    </div> 
</div>   

<?php
    include('footer.php');
?>