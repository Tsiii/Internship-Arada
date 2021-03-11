<?php   
    include("security.php");   

    include("sidemenu.php"); 
    include("top.php"); 
?>
    <!-- Begin Page Content -->
    <div class="container-fluid"> 
        
        <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin: 0 auto;">  
                
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Issue Requests</h1>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold "> </h6>
                </div>
                
                <div class="card-body">  
                    <form name="form1" action="" method="post" style="margin-top:5px;">  
                        <table class="table table-bordered">
                            <tr>
                                <td><input type="text" class="form-control" name="username"  placeholder=" <?php echo $_SESSION['username']; ?>" disabled/></td>
                            </tr>   
                            <tr>
                                <td>
                                    <select name="services" class="form-control selectpicker" required="">
                                        <option>Select Services</option>
                                        <?php
                                            $res = mysqli_query($db, "SELECT Service_Type FROM Services");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["Service_Type"];
                                                echo "</option>"; 
                                            }
                                        ?> 
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <select name="computerbrand" class="form-control selectpicker" required>
                                        <option>Select Computer / Printer Brand</option>
                                        <?php
                                            $res = mysqli_query($db, "SELECT Computer_Brand FROM brand");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["Computer_Brand"];
                                                echo "</option>"; 
                                            }
                                        ?> 
                                    </select>
                                </td>
                            </tr> 
                            <tr> 
                                <td>   
                                    <select name="assignto" class="form-control selectpicker">
                                        <option >Select IT EMPLOYEE</option>
                                        <?php
                                        $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
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
                                <td> 
                                    <textarea rows="3" value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestdescription"  placeholder="Describe Details If Necessary" required=""></textarea>
                                </td>
                            </tr>
                            <tr>
                            </tr> 
                        </table>         
                        <input type="text"  value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestissuedate"  placeholder="requestissuedate"  hidden/>
                
                        <input type="submit"  name="submit1" class="form-control btn btn-primary" value="Request Maintenance" />

                    </form>

                    <?php    
                        if(isset($_POST["submit1"])){  
                            if ( $_POST['services'] == "Select Services" || $_POST['computerbrand'] == "Select Computer / Printer Brand" || $_POST['assignto'] == "Select IT EMPLOYEE"  ){ 
                                    
                                echo '<div class="alert alert-danger col-lg-6 text-center mt-3" style="margin: 0 auto"> One or More Options are Empty </div> '; 
                            }
                            elseif ($_POST['services'] != "Select Services" || $_POST['computerbrand'] != "Select Computer / Printer Brand" || $_POST['assignto'] != "Select IT EMPLOYEE"  ){  

                                $assignto = $_POST['assignto']; 
                                $requestdescription = mysqli_real_escape_string($db,$_POST['requestdescription']); 

                                $resultStatus = mysqli_query($db," SELECT ID,Ticket_Number, LEFT(Ticket_Number,8) ,Requested_Date FROM maintenancerequest ORDER BY ID DESC ");
                                $row = mysqli_fetch_assoc($resultStatus); 
                                        
                                $dateymd = date('Ymd');
                                $id = $row['ID'] + 1; 
                                $date = date('Y-m-d H:i:s');  
                                $lastdate = $row['LEFT(Ticket_Number,8)']  ;  
                                    
                                if($lastdate !== $dateymd){  
                                    $ticketnumber = date('Ymd') . 1; 
                                        
                                }
                                elseif($lastdate == $dateymd){
                                    $ticketnumber = $row['Ticket_Number'] + 1 ; 

                                }   

                                if($ticketnumber !== $row['Ticket_Number']){   
                                        
                                    if(mysqli_query($db,"INSERT INTO maintenancerequest (ID ,Ticket_Number ,Services, Computer_Type, Request_Description, Assigned_To, User_Namee, Requested_Date )
                                        VALUE ($id , $ticketnumber,'$_POST[services]','$_POST[computerbrand]','$requestdescription', '$assignto','$_SESSION[username]', '$date')")){ 
                                        
                                        mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED' , Assigned_Date =  '$date'  WHERE Ticket_Number='$ticketnumber'  ");
                                        
                                        mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                                 
                                        echo '<div class="alert alert-success col-lg-10 mb-2 mt-2 text-center" style="margin: 0 auto">
                                            <strong style=" width:100%;"> You Have Requested  a Maintenance & Assigned To 
                                                <i style="color:black;">'. $assignto.'</i>.<br> Your Ticket Number is  <i style="color:black;">'. $ticketnumber . '.</i>
                                            </strong> 
                                        </div> ';  
                                        unset($_POST); 
                                    }
                                    else{
                                        echo ("Error Description: " .mysqli_error($db));
                                    }  
                                }   
                                else{  
                                    echo("Error description: " . mysqli_error($db)); 
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