<?php    
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables2/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>  
<style>
    input,.form-control{
        border-radius: 30px;
    }
    .card-header{
        background-color: transparent;
        border-bottom: none;
    }
</style>

<body style="background-color: lightgrey; margin-top: 25px;">  
    <div class="mb-4 mb-lg-0 col-md-5 bg-white  border rounded border-light p-4 " style="margin:25px auto!important;">
        <h1 class="text-center text-md-center mb-0 h3">Create an account</h1> 
        <form action="#" class="mb-4 mb-lg-0 col-md-10 "style="margin: 0 auto;">

            <!-- Form -->
            <div class="form-group mb-2">
                <label for="email">First Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-user-alt"></span></span>
                    <input type="text"  class="form-control" name="firstname"  placeholder="First Name" autofocus="" required="">
                </div>  
            </div>
            <!-- End of Form -->  

            <!-- Form -->
            <div class="form-group mb-2">
                <label for="email">Middle Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-user-alt"></span></span>
                    <input type="text"  class="form-control" name="middlename"  placeholder="Middle Name" autofocus="" required="">
                </div>  
            </div>
            <!-- End of Form -->

            <!-- Form -->
            <div class="form-group mb-2">
                <label for="email">Last Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-user-alt"></span></span>
                    <input type="text"  class="form-control" name="lastname"  placeholder="Last Name" autofocus="" required="">
                </div>  
            </div>
            <!-- End of Form -->

            <div class="form-group">
                <!-- Form -->
                <div class="form-group mb-2">
                    <label for="password">Your Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon4"><span class="fas fa-unlock-alt"></span></span>
                        <input type="password" placeholder="Password" class="form-control" id="password" required="">
                    </div>  
                </div>
                <!-- End of Form -->

                <!-- Form -->
                <div class="form-group mb-2">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="fas fa-unlock-alt"></span></span>
                        <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" required="">
                  </div>  
                </div>   
                <!-- End of Form -->

                <!-- Form -->
                <div class="form-group mb-2">
                    <label for="phone">phone </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="fas fa-phone"></span></span>
                        <input type="tel" placeholder="Phone" class="form-control" id="phone" required="">
                  </div>  
                </div>    
                <!-- End of Form --> 
                
                <!-- Form -->
                <div class="form-group mb-2">
                    <label for=" ">Department</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="fab fa-elementor"></span></span> 
                        <select class="form-control" id="department" name="department" required="">
                            <option >Select Department</option>
                            <option name="department" value="ICT">0</option> 
                        </select>
                    </div>  
                </div>    
                <!-- End of Form -->

                <!-- Form -->
                <div class="form-group mb-2">
                    <label for=" ">Woreda </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="fas fa-unlock-alt"></span></span>
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
                    </div>  
                </div>    
                <!-- End of Form -->

                <!-- Form -->
                <div class="form-group mb-2">
                    <label for=" "> User Type </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="fas fa-user-tie"></span></span>
                        <select class="form-control" name="usertype" required=""> 
                            <option>Select User Type</option> 
                            <option  name="usertype" value="IT Employee">IT Employee</option>
                            <option  name="usertype" value="Employee" >Employee</option> 
                        </select>   
                    </div>  
                </div>    
                <!-- End of Form --> 

                <!-- Form -->
                <div class="form-group mb-2">
                    <label for=" ">User Image </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon5"><span class="far fa-image"></span></span>
                        <input type="file" placeholder="image upload" class="form-control" id="file1" required="">
                    </div>  
                </div>    
                <!-- End of Form -->           
                      
                <!-- End of Form -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="terms" required="">
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-block btn-primary">Sign in</button>
        </form>

        <div class="mt-3 mb-4 text-center">
            <span class="font-weight-normal">or</span>
        </div> 

        <div class="d-flex justify-content-center align-items-center mt-4">
            <span class="font-weight-normal">
                Already have an account?
                <a href="./login.php" class="font-weight-bold">Login here</a>
            </span>
        </div>
    </div>  

    <?php

    if (isset($_POST['register'])) { 

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
                Phone,Woreda,User_Image,User_Type,Department, Registered_Date)
                VALUE ('$id','$_POST[firstname]','$_POST[middlename]','$_POST[lastname]','$username',
                '$_POST[password]','$_POST[phone]','$_POST[woreda]','$dst1','$_POST[usertype]','$_POST[department]', ' $date')")){
                
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
    
<?php      
    include("footer.php");  
?>   