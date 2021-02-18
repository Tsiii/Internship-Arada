<?php   
   
   include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
<!-- Begin Page Content -->
<div class="container-fluid"> 
    
    <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin: 0 auto;">  
            
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Fill Satisfaction</h1>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold "> </h6>
            </div>
            
            <div class="card-body">  
                <form name="form1" action="" method="post" style="margin-top:5px;">  
                    <table class="table table-bordered">  
                        <tr>
                            <td><input type="text" class="form-control" name="assignedto"  placeholder=" <?php echo $_SESSION['username']; ?> " disabled/></td>
                        </tr> 
                        <tr>
                            <td>
                                <select name="ticketnumber" class="form-control selectpicker" required="">
                                    <option>Select Ticket Number</option>
                                    <?php   
                                        $res = mysqli_query($db, "SELECT Ticket_Number, Assigned_To FROM maintenancerequest WHERE User_Namee = '$_SESSION[username]' AND Request_Status = 'MAINTAINED' ");
                                        $row = mysqli_fetch_assoc($res);
                                        
                                        while($row2=mysqli_fetch_array($res)){
                                            echo "<option>";
                                            echo $row2["Ticket_Number"];
                                            echo "</option>"; 
                                        }
                                    ?> 
                                </select>
                            </td>
                        </tr> 
                        <tr hidden>
                            <td> <input type="text" class="form-control" name="assignedto"  value=" <?php echo $row['Assigned_To']; ?> " placeholder="Assigned To" hidden/></td>
                        </tr>
                        <tr>
                            <td> 
                                <select class="form-control" id="sel1" name="rate" required="">
                                    <option >Select Rate</option> 
                                    <option name="rate" value="1">1</option>
                                    <option name="rate" value="2">2</option>
                                    <option name="rate" value="3">3</option>
                                    <option name="rate" value="4">4</option>
                                    <option name="rate" value="5">5</option> 
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td> 
                                <textarea rows="5" value="<?php echo date("d-m-y"); ?>" class="form-control" name="satisfactiondescription"  placeholder="Describe Your thought on this request" required=""></textarea>
                            </td>
                        </tr>
                        <tr hidden>
                            <td><input type="text"  value="<?php echo date("d-m-y"); ?>" class="form-control" name="satisfactionissuedate"  placeholder="requestissuedate"  hidden/></td>
                        </tr>
                        <tr>
                            <td><input type="submit"  name="submit1" class="form-control btn btn-primary" value="Request Maintenance" /></td>
                        </tr> 
                    </table>   
                </form>

                <?php    
                    if(isset($_POST["submit1"])){  

                        $satisfactiondescription =  mysqli_real_escape_string($db,$_POST['satisfactiondescription']); 
                        $username = $_SESSION['username'];
                        $assignedto = $_POST['assignedto']; 
                        
                        $date = date('Y-m-d H:i:s');  

                        $resultStatus = mysqli_query($db," SELECT * FROM satisfaction WHERE  Ticket_Number =  '$_POST[ticketnumber]' ");
                        $row = mysqli_fetch_assoc($resultStatus); 
                        $row1 = mysqli_num_rows($resultStatus); 
                          
                        if ($row1 == 0){  
                            
                            if(mysqli_query($db,"INSERT INTO satisfaction (Ticket_Number, User_Namee ,Assigned_To, Satisfaction, Changed, Employee_Comment, Rated_Date)
                                VALUE ('$_POST[ticketnumber]','$_SESSION[username]','$assignedto','$_POST[rate]','0', '$satisfactiondescription','$date' ) ")){ 
                            
                                //mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                    
                                echo '<div class="alert alert-success col-lg-10 " style="margin: 0 auto">
                                    <strong style="color:white; width:100%;">   <h2 style="color:black;"> Satisfaction Sucessfully Filled </h2></strong> 
                                </div> ';  
                                unset($_POST); 

                            }
                            else{
                                echo("Error description: " . mysqli_error($db));  
                            }
                        }
                        elseif ($row1 > 0) { 
                            if($_POST['ticketnumber'] == $row['Ticket_Number'] ){ 
                                
                                echo '<div class="alert alert-danger col-lg-6 text-center mt-3" style="margin: 0 auto"> Satisfaction Already Filled  </div> '; 
        
                            }
                        } 
                        else{ 

                            echo("Error description: " . mysqli_error($db));  
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
</div>