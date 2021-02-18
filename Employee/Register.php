<?php 
    include("../includes/server.php");  
	session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 	
    
    <!--------- CSS --------- -->
	<link rel="stylesheet" href="../fontawesome5/css/all.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css" /> 

	<!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head> 

<body>
<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " > 
    <div class="row">    
    
        <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="text-align:center; margin:0 auto; ">  
            <div class="x_panel"  style="text-align:center;" >
                <div class="x_title"> 
                    <h3>Add Information</h3>

                    <div class="clearfix"></div>
                </div>

                <div class="x_content"  style="margin:0 auto; text-align:center; " >
                    <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data" style="margin:0 auto; text-align:center;  margin-bottom:15px" >
                        <table class="table table-bordered">
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
                                        <option  name="usertype" value="IT Employee">IT Employee</option>
                                        <option  name="usertype" value="Employee" >Employee</option> 
                                    </select>  
                                </td>
                            </tr> 
                            <tr> 
                                <td>user image<input type="file"  name="file1"  required=""/></td>
                            </tr> 
                        </table>   

                        <input  align="center" type="submit" style=" text-align: center;"  name="submit1" class="btn btn-primary " value="Register" />
                        
                    </form>
                </div>

                <?php 
                    if (isset($_POST['submit1'])) { 

                        $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
                        $middlename = mysqli_real_escape_string($db,$_POST['middlename']);
                        $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
                        $password = mysqli_real_escape_string($db,$_POST['password']);
                        
                        $resultStatus = mysqli_query($db," SELECT * FROM user ORDER BY ID DESC ");
                        $row = mysqli_fetch_assoc($resultStatus); 

                        $id = $row['ID'] + 1;   
                        $tm = md5(time());
                        $fnm = $_FILES["file1"]["name"];
                        $dst= "../Images/".$tm.$fnm;
                        $dst1= "../Image/".$tm.$fnm;
                        move_uploaded_file($_FILES['file1']['tmp_name'],$dst);
                        $date = date('Y-m-d H:i:s');  
                
                        //check if input character are valid
                        if (!preg_match("/^[a-zA-Z]*$/", $firstname)  || !preg_match("/^[a-zA-Z]*$/", $middlename) || 
                            !preg_match("/^[a-zA-Z]*$/", $lastname)  ) {
                                echo "Invalid Character";
                        }
                        else {   

                            $password = md5($password);

                        
                            $resultStatus = mysqli_query($db," SELECT * FROM user WHERE User_Type = '$_POST[usertype]' ORDER BY ID DESC ");
                            $row = mysqli_fetch_assoc($resultStatus); 
                            
                            $username =$row['User_Namee'] ; 
                            $username ++ ;    

                            if(mysqli_query($db,"INSERT INTO user (ID,First_Name,Middle_Name,Last_Name,User_Namee,User_Password,
                                Phone,Woreda,User_Image,User_Type, Registered_Date)
                                VALUE ('$id','$_POST[firstname]','$_POST[middlename]','$_POST[lastname]','$username',
                                '$_POST[password]','$_POST[phone]','$_POST[woreda]','$dst1','$_POST[usertype]', ' $date')")){
                                
                                $_SESSION["username"]=$username; 
                                $_SESSION["status"]="Pending"; 
                
                                echo 'YOU HAVE REGISTERED SUCCESSFULLY';
                                echo "<br> <h3> " . $username . "</h3> Is Your User Name ";
                                unset($_POST);?>
                                <script type="text/javascript">
                                    window.location="index.php";
                                
                                </script>
                                <?php
                                

                            }else{ 
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