<?php  
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsion</title>
 
    <!--------- CSS --------- -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
    <link href="../fontawesome5/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/na.css" rel="stylesheet" id="bootstrap-css">
        
    <!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>   
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
     
</head>
<body>
    <div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " > 
        <div class="row">    
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" style="text-align:center; margin:0 auto; ">  
                <div class="x_panel"  style="text-align:center;" >
                    <div class="x_title"> 
                        <h1 class="h4 text-grey-900 mb-4">Login Here!</h1>
                    </div>

                        <form action="" method="POST" class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Your Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Your Password" required>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                            <hr> 
                            <div><a href="../itemployee/Login.php">Login as An IT Employee </a></div>
                            <div><a href="../employee/Login.php">Login as An Employee </a></div>
                        </form> 
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
    </div>  
 

<?php    
    include("footer.php");   
?>

