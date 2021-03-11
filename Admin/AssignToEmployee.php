<?php   
    include("security.php");   
   
    include("sidemenu.php"); 
    include("top.php"); 
?> 

<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " > 
    <div class="row">      
        <div  style="margin:0 auto;"> 
            <div  style="text-align:center; ">
                <div class="x_panel"  style="text-align:center;" >
                    <div class="x_title"> 
                        <h3>Assign Request To IT Employee</h3>
                    </div>
                </div>

                <div class="x_content" id="tohidetoassign" >
                    <form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" >                  
                        <input type="text" name="ticketnumber" placeholder="Ticket Number" required/>  
                        <button type="submit" name="submit1" class=" btn btn-primary">search</button>
                    </form> 

                    <form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" >                  
                       <button type="submit" name="submit0" class=" btn btn-primary">Show All Requests</button>
                    </form>  
                </div> 

                <?php  
                 
                if (isset($_POST['submit0'])) {
                    $res0 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Assigned_To ='All'   ");   
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
                } 

                if(isset($_POST['submit1'])){        
                    $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");

                    $resultCheck = mysqli_num_rows($result);
                    $row5 = mysqli_fetch_array($result); 

                    if($resultCheck == 0 ){    
                        echo "Wrong Ticket Number";  
                    } 

                    elseif($resultCheck > 0){ 
 
                        $res = mysqli_query($db, "SELECT Assigned_To FROM maintenancerequest WHERE Ticket_Number='$_POST[ticketnumber]' ");
                        $row2 = mysqli_fetch_array($res);
                        $assigned = $row2['Assigned_To'] ;
                        if ($assigned !== 'All') {
                            ?>
                            <div class="alert alert-danger " style="margin: auto; max-width: fit-content;">
                                <strong style="color:white; width:100%;">Ticket Number <i style="color:black;">' <?php echo $_POST['ticketnumber'] ?> '</i> is Already Assigned To <i style="color:black;"> <?php echo $row2['Assigned_To'] ?> </i></strong> 
                            </div>
                            <?php 
                        }  
                        elseif($assigned == "All") {
                            $res5 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");
                            $row5 = mysqli_fetch_array($res5);
                            $username = $row5["User_Namee"]; 
                            $woreda = $row5["Woreda"]; 
                            $ticketnumber = $row5["Ticket_Number"];   
                            ?>  

                            <form name="form1" action="" method="post" style="margin:0 auto; margin-top:15px; margin-bottom:15px;" >                  
                                <input type="text" name="ticketnumber1" value="<?php echo $row5["Ticket_Number"] ?>" class="form-control" hidden/> 

                                <table class="table table-bordered">
                                    <tr>  
                                        <td><input type="text" name="ticketnumber13" value="<?php echo $row5["Ticket_Number"];  ?>" class="form-control" placeholder="Ticket Number" disabled/></td>
                                    </tr> 
                                    <tr>
                                        <td><input type="text" name="username" value="<?php echo $username ?>"class="form-control"  placeholder="User Name" disabled/></td>
                                    </tr>  
                                    <tr> 
                                        <td>   
                                            <select name="assignto" class="form-control selectpicker">
                                                <option >Select IT EMPLOYEE</option>
                                                <?php
                                                $res = mysqli_query($db, "SELECT * FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                                while($row=mysqli_fetch_array($res)){
                                                    echo "<option  name='assignto' > ";
                                                    echo $row["User_Namee"];
                                                    echo "</option>";
                                                }
                                                ?> 
                                            </select>  
                                        </td>
                                    </tr> 

                                    <tr>
                                        <td><input type="submit" name="submit2" class="form-control btn btn-primary" value="Assign Request"  /></td>
                                    </tr>  
                                </table>   
                            <?php
                        } 
                    }      
                    ?>
                        </form>
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
            </div>
        </div>
    </div>
</div>         
<?php 
    include('footer.php');   
?>