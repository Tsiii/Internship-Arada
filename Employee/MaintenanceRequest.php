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
                <h6 class="m-0 font-weight-bold ">Result</h6>
            </div>
            
            <div class="card-body">  
                <form name="form1" action="" method="post" style="margin-top:5px;">  
                    <table class="table table-bordered">
                        <tr>
                            <td><input type="text" class="form-control" name="username"  placeholder=" <?php echo $_SESSION['username']; ?> " disabled/></td>
                        </tr>   
                        <tr>
                            <td>
                                <select name="services" class="form-control selectpicker" required="">
                                    <option>Select Services</option>
                                    <?php
                                        $res = mysqli_query($db, "SELECT Services FROM Services");
                                        while($row=mysqli_fetch_array($res)){
                                            echo "<option>";
                                            echo $row["Services"];
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
                                <textarea rows="5" value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestdescription"  placeholder="Describe Details If Necessary" required=""></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit"  name="submit1" class="form-control btn btn-primary" value="Request Maintenance" /></td>
                        </tr>
                        <tr hidden>
                            <td><input type="text"  value="<?php echo date("d-m-y"); ?>" class="form-control" name="requestissuedate"  placeholder="requestissuedate"  hidden/></td>
                        </tr> 
                    </table>   
                </form>

                <?php    
                    if(isset($_POST["submit1"])){  

                        
                        if ( $_POST['services'] == "Select Services" || $_POST['computerbrand'] == "Select Computer / Printer Brand"){ 
                                    
                            echo '<div class="alert alert-danger col-lg-6 text-center mt-3" style="margin: 0 auto"> One or More Options are Empty </div> '; 
                        }
                        elseif ($_POST['services'] != "Select Services" || $_POST['computerbrand'] != "Select Computer / Printer Brand" || $_POST['assignto'] != "Select IT EMPLOYEE"  ){

                            $requestdescription =  mysqli_real_escape_string($db,$_POST['requestdescription']); 
                            $username= $_SESSION['username'];

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
                                    VALUE ($id , $ticketnumber,'$_POST[services]','$_POST[computerbrand]','$requestdescription','$_SESSION[username]', '$date' ) ");
                                    
                                mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                    
                                echo "<br> Your Ticket Number is " . $ticketnumber; 

                                $countStatus = 0;
                                $resultStatus = mysqli_query($db, "SELECT Total FROM services WHERE Service_Type='$_POST[services]' ");
                                $countStatus = mysqli_num_rows($resultStatus); 
                                $row = mysqli_fetch_assoc($resultStatus);
                                    
                            }
                            elseif ($ticketnumber !== $row['Ticket_Number']){  
                                
                                if(mysqli_query($db,"INSERT INTO maintenancerequest (ID ,Ticket_Number ,Services, Computer_Type, Request_Description, User_Namee, Requested_Date)
                                    VALUE ($id , $ticketnumber,'$_POST[services]','$_POST[computerbrand]','$requestdescription','$_SESSION[username]', '$date' ) ")){ 
                                
                                    mysqli_query($db, "UPDATE services SET Quantity = Quantity + 1 , In_Progress = In_Progress + 1 , Total = Quantity * Cost WHERE Service_Type='$_POST[services]'  ");
                                        
                                    echo '<div class="alert alert-success col-lg-10 " style="margin: 0 auto">
                                        <strong style="color:white; width:100%;"> Your Ticket Number is  <h2 style="color:black;">'. $ticketnumber . '</h2></strong> 
                                    </div> '; 

                                    $resultStatus2 = mysqli_query($db, "SELECT First_Name, Middle_Name, Last_Name FROM user WHERE User_Namee = '$_SESSION[username]' ");
                                    $row2 = mysqli_fetch_assoc($resultStatus2);
                                    
                                    $firstname = $row2['First_Name']; 
                                    $middlename = $row2['Middle_Name']; 
                                    $lastname = $row2['Last_Name']; 

                                    mysqli_query($db,"UPDATE maintenancerequest  SET First_Name= '$firstname', Middle_Name= '$middlename', Last_Name= '$lastname' WHERE User_Namee = '$_SESSION[username]'");
                                    unset($_POST); 

                                }
                                else{
                                    echo("Error description: " . mysqli_error($db));  
                                }
                            } 
                            else{ 

                                echo("Error description: " . mysqli_error($db));  
                            } 
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