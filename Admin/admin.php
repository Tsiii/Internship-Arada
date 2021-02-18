<?php 
/* 
    session_start();

    if(isset($_SESSION['usertype']) ){
        if(isset($_SESSION['username']) && $_SESSION['usertype'] == "ADMIN" ) {
            ?>
            <script type="text/javascript">
                window.location="index.php";
            </script> 
            <?php
        }
    }  
    include("../includes/server.php");  
*/
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    	  
        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables2/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

</head>

  
<!-- IT Employee Report Column -->
<div class="col-lg-12 mb-4" >  
    <div class="row">
        <div class="col-md-6 mx-auto p-0">
            <div class="card mx-auto">
                <div class="login-box">
                    <div class="login-snip">  
                        <label for="tab-1" class="tab">Login</label>  
                        <div class="login-space">
                            <div class="login">
                            
                            <form action="" method="POST" class="user">
                                <div class="group"> 
                                    <label for="user" class="label">Username</label> 
                                    <input id="user" type="text" name="username" class="input" placeholder="Enter your username"> 
                                </div>

                                <div class="group"> 
                                    <label for="pass" class="label">Password</label> 
                                    <input id="pass" type="password" name="password" class="input" data-type="password" placeholder="Enter your password"> 
                                </div>

                                <div class="group"> 
                                    <input id="check" type="checkbox" class="check" checked> <label for="check">
                                        <span class="icon"></span> Keep me Signed in</label> 
                                </div>

                                <div class="group"> 
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button> 
                                </div>

                                <div class="hr"></div>
                                <div class="foot text-center"> <a href="#">Forgot Password?</a> </div>
                            </form>
                            </div>  
                        </div> 
                    </div>
                </div>
                    
                <?php 
                    if(isset($_POST['login'])){

                        $username = mysqli_real_escape_string($db,$_POST['username']);
                        $password = mysqli_real_escape_string($db,$_POST['password']);

                        //$password = md5($password);

                        $count = 0;
                        $result = mysqli_query($db, "SELECT * FROM user WHERE User_Namee='$username' AND User_Password='$password' AND  User_Type='ADMIN'  ");
                        
                        $count = mysqli_num_rows($result);  

                        $countStatus = 0;
                        $resultStatus = mysqli_query($db, "SELECT User_Status, User_Image, User_Type FROM user WHERE User_Namee='$username' AND User_Password='$password' ");
                        $countStatus = mysqli_num_rows($resultStatus); 
                        $row = mysqli_fetch_assoc($resultStatus);
                            
                        if ($count==0)  {	
                            ?> 
                            <div class= "alert alert-danger alert-dismissible fade show " id= "alertmsg" >   
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h3><strong>Error:</strong> Invalid Username Or Password.  </h3>
                            </div>	 
                            <?php
                        }
                        elseif ($row['User_Status'] == "ACCEPTED") { 

                            $_SESSION["username"]=$username;  
                            $_SESSION["usertype"]=$row['User_Type'];  
                            $_SESSION["status"]="Accepted"; 
                            $_SESSION["image"]= $row['User_Image'] ; 

                            $itemployee = "IT EMPLOYEE"; 
                            
                            if($row['User_Type'] == "IT EMPLOYEE" ){ 
                                $_SESSION["itemployee"] = $itemployee;  
                            }   
                            ?> 
                            <div class= "alert alert-success" id= "alertmsg" >  
                                    <h1>Hi <?php  echo $_SESSION['username']; ?> Welcome Back <i class="far fa-smile"></i></h1>
                                </div> 
                            <?php
                            header("Refresh:5; url= displayuser.php" ); 
                            

                        }
                        elseif ($row['User_Status'] == "PENDING") { 
                            $_SESSION["username"]=$username;
                            $_SESSION["status"]="Pending";    
                            $_SESSION["image"]= $row['User_Image'] ;  
                            ?>
                            <div class= "alert alert-warning alert-dismissible fade show " id= "alertmsg" >   
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h3><strong>Sorry:</strong>your account is not approved</h3> 
                            </div> 
                            <?php
                        } 
                        elseif($row['User_Status'] == "REJECTED") { 
                            $_SESSION["username"]= $username;  
                            $_SESSION["status"]= "Rejected";  
                            $_SESSION["image"]= $row['User_Image'] ; 
                            ?> 
                            <div class= "alert alert-danger alert-dismissible fade show " id= "alertmsg" >   
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h3><strong>Error:</strong> Your ACCOUNT HAS Been REJECTED!! </h3> 
                            </div>	 
                            <?php
                        } 
                        else{ 
                            ?>
                            <div class= "alert alert-danger alert-dismissible fade show " id= "alertmsg" >   
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h3><strong>Error:</strong> UNKNOWN ERROR HAS OCCURRED PLEASE TRY AGAIN.  </h3>
                            </div> 
                            <?php  
                        }		
                    }
                ?>

            </div> 
        </div>
    </div>   
 

<?php 
    include('footer.php');   
?>