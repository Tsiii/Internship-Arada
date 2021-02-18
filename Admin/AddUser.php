<?php  
    include("security.php");   

    include("sidemenu.php"); 
    include("top.php"); 
?> 
    <!-- Begin Page Content -->
    <div class="container-fluid">  
        <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin: 0 auto;">  
                
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center">Add a User</h1>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold "></h6>
                </div>
                
                <div class="card-body">  
                    <form name="form1" action="" method="post" enctype="multipart/form-data"  style="margin:0 auto; text-align:center;  margin-bottom:15px">
                        <table class="table table-bordered" >
                            <tr>
                                <td><input type="text"  class="form-control" name="firstname"  placeholder="First Name" required=""/></td>
                            </tr> 
                            <tr>
                                <td><input type="text"  class="form-control" placeholder="Middle Name" name="middlename" required=""/></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="form-control" placeholder="Last name" name="lastname" required=""/></td>
                            </tr>  
                            <tr>
                                <td><input type="tel"  class="form-control" placeholder="Phone" name="phone" required=""/></td>
                            </tr>  
                            <tr>
                                <td><input type="password"  class="form-control" placeholder="Password" name="password" required=""/></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="form-control" placeholder="Department" name="department" required=""/></td>
                            </tr> 
                            <tr>
                                <td> 
                                    <select class="form-control" id="sel1" name="woreda" required="">
                                        <option >Select Woreda</option>
                                        <option name="woreda" value="0">0</option>
                                        <option name="woreda" value="1">1</option>
                                        <option name="woreda" value="2">2</option>
                                        <option name="woreda" value="3">3</option>
                                        <option name="woreda" value="4">4</option>
                                        <option name="woreda" value="5">5</option>
                                        <option name="woreda" value="6">6</option>
                                        <option name="woreda" value="7">7</option>
                                        <option name="woreda" value="8">8</option>
                                        <option name="woreda" value="9">9</option>
                                        <option name="woreda" value="10">10</option>
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <select class="form-control" name="usertype" required=""> 
                                        <option>Select User Type</option>
                                        <option  name="usertype" value="ADMIN">Admin</option>
                                        <option  name="usertype" value="IT Employee">IT Employee</option>
                                        <option  name="usertype" value="EMPLOYEE">Employee</option> 
                                    </select>  
                                </td>
                            </tr> 
                            <tr> 
                                <td>user image<input type="file"  name="file1"  required=""/></td>
                            </tr> 
                        </table>  
                        
                        <input align="center" type="submit" style=" text-align: center;"  name="submit1" class="btn btn-primary " value="Insert User details" />
                        
                    </form> 
        
                    <?php
                        if (isset($_POST['submit1'])) { 
 
                            $resultStatus = mysqli_query($db," SELECT * FROM user ORDER BY ID DESC ");
                            $row = mysqli_fetch_assoc($resultStatus); 
                            $username =$row['User_Namee'] ; 
                            $username ++ ;    

                            
                            $check = mysqli_query($db, "SELECT * FROM user WHERE First_Name = '$_POST[firstname]' AND Middle_Name = '$_POST[middlename]' AND Last_Name = '$_POST[lastname]' OR Phone = '$_POST[phone]' AND Woreda = '$_POST[woreda]' AND User_Type  = '$_POST[usertype]' ");
                            $resultCheck = mysqli_num_rows($check);

                            $id = $row['ID'] + 1;   
                            $tm = md5(time());
                            $fnm = $_FILES["file1"]["name"];
                            $dst2= "../Image/".$tm.$fnm;
                            $dst1= "../Image/".$tm.$fnm;
                            $dst = "../Images/".$tm.$fnm;
                            $date = date('Y-m-d H:i:s'); 
                             
                            if($_POST['usertype'] = "EMPLOYEE"){
                                $resulttype = mysqli_query($db," SELECT User_Namee, LEFT(User_Namee,12) FROM user WHERE User_Namee LIKE '%EMPLOYEE%' ORDER BY ID DESC ");
                                $row1 = mysqli_fetch_assoc($resulttype);  
                                $username = $row1['User_Namee']  ; 
                                $username ++;
                            }
                            elseif($_POST['usertype'] = "IT EMPLOYEE"){ 
                                $resulttype = mysqli_query($db," SELECT User_Namee, LEFT(User_Namee,6) FROM user WHERE User_Namee LIKE '%IT%' ORDER BY ID desc ");
                                $row1 = mysqli_fetch_assoc($resulttype);  
                                $username = $row1['User_Namee']  ; 
                                $username ++;
                            }
                             
                            if ($resultCheck > 0) {
                                ?>
                                <div class="text-danger bg-light col-md-6 " style="margin:0 auto; text-align:center; ">
                                        You Already Have Registered a User With The Same Information.
                                    </div> 
                                <div class="text-danger" style="text-align:center; "> 
                                <?php
                            }
                            elseif ($resultCheck == 0) {  
                                $password = md5($_POST['password']); 
                            
                                if(mysqli_query($db,"INSERT INTO user (ID,First_Name,Middle_Name,Last_Name,User_Namee,User_Password,Phone,Woreda,Department,User_Image,User_Type,User_Status,Registered_Date)
                                    VALUE ('$id','$_POST[firstname]','$_POST[middlename]','$_POST[lastname]','$username',
                                    '$password','$_POST[phone]','$_POST[woreda]','$_POST[department]','$dst1','$_POST[usertype]','ACCEPTED',' $date')")){
                                    
                                    echo '<div class="text-danger bg-dark" style="text-align:center; "> 
                                        YOU HAVE REGISTERED A USER SUCCESSFULLY </div>';
                                            
                                    move_uploaded_file($_FILES['file1']['tmp_name'],$dst2);
                                    move_uploaded_file($_FILES['file1']['tmp_name'],$dst1);
                                            
                                    unset($_POST);
                                }else{
                                    echo "AN ERROR HAS OCCURRED <br><br>"; 
                                    echo("Error description: " . mysqli_error($db)); 
                                } 
                            } 
                            else{
                                echo "AN zzERROR HAS OCCURRED <br><br>"; 
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