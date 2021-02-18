<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
        <div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
            <div class="x_panel"  style="text-align:center;" >
                <div class="x_title"> 
                    <h3>Issue Request</h3>

                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form name="form1" action="" method="post" style="margin-top:5px;">  
                        <table class="table table-bordered">
                            <tr>
                                <td><input type="text" class="form-control" name="username"  placeholder="<?php echo $_SESSION['username']; ?> " disabled/></td>
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
                                    <textarea rows="7" value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestdescription"  placeholder="Describe Details If Necessary" required=""></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text"  value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestissuedate"  placeholder="requestissuedate"  hidden/></td>
                            </tr>
                            <tr>
                                <td><input type="submit"  name="submit1" class="form-control btn btn-primary" value="Request Maintenance" /></td>
                            </tr>
                            
                        </table>   
                    </form>

                    <?php   

                        if(isset($_POST["submit1"])){  

                            $requestdescription =  mysqli_real_escape_string($db,$_POST['requestdescription']); 

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

                            if($ticketnumber == $row['Ticket_Number']){   
                                
                                $ticketnumber = $row['Ticket_Number'] ++ ;
                                
                                echo 'NEW Ticket Number, '. $ticketnumber;  

                                mysqli_query($db,"INSERT INTO maintenancerequest (ID ,Ticket_Number ,Services, Computer_Type, Request_Description, User_Namee, Requested_Date)
                                    VALUE ($id , $ticketnumber,'$_POST[services]','$_POST[computerbrand]','$requestdescription','AR-EMPLOYEE01', '$date' ) ");
                                    
                                mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                    
                                echo "<br> Your Ticket Number is " . $ticketnumber; 

                                $countStatus = 0;
                                $resultStatus = mysqli_query($db, "SELECT Total FROM services WHERE Service_Type='$_POST[services]' ");
                                $countStatus = mysqli_num_rows($resultStatus); 
                                $row = mysqli_fetch_assoc($resultStatus);
                                  
                            }
                            elseif ($ticketnumber !== $row['Ticket_Number']){  
                                
                                mysqli_query($db,"INSERT INTO maintenancerequest (ID ,Ticket_Number ,Services, Computer_Type, Request_Description, User_Namee, Requested_Date)
                                VALUE ($id , $ticketnumber,'$_POST[services]','$_POST[computerbrand]','$requestdescription','AR-EMPLOYEE01', '$date' ) ");
                                
                                mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                      
                                echo '<div class="alert alert-success col-lg-10 " style="margin: 0 auto">
                                    <strong style="color:white; width:100%;"> Your Ticket Number is  <h2 style="color:black;">'. $ticketnumber . '</h2></strong> 
                                </div> '; 
                                
                                unset($_POST);

                                $countStatus = 0;
                                $resultStatus = mysqli_query($db, "SELECT Total FROM services WHERE Service_Type='$_POST[services]' ");
                                $countStatus = mysqli_num_rows($resultStatus); 
                                $row = mysqli_fetch_assoc($resultStatus);

                            } 
                            else{ 

                                echo("Error description: " . mysqli_error($db)); 
                            
                            }  
                               
                        } 
                    ?>
                </div>
            </div>
        </div> 

<div style="text-align: center;">
<?php
    include('footer.php');
?>
</div>