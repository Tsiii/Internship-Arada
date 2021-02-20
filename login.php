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
<<<<<<< HEAD:Admin/admin.php
    include("../includes/server.php");  

=======
    include("includes/server.php");  
 
>>>>>>> 4fd727baf874207cff1257c2e351ee4379a2f34e:login.php
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    	  
        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables2/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

</head>

  
<!-- IT Empl oyee Report Column -->
<div class="col-lg-12 mb-4" >  
    <div class="row">
    
        <div class="col-md-6 mx-auto p-0">
            <!-- Page Heading -->
        <h1 class="h3 mb-2  text-center mb-4 text-primary ">Arada Subcity ICT</h1>
            <div class="card mx-auto">
                <div class="login-box">
                    <div class="login-snip">  
                        <label for="tab-1" class="tab">Login</label>  
                        <div class="login-space">
                            <div class="login">
                            
<<<<<<< HEAD:Admin/admin.php
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
                
=======
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
                            
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="font-weight-normal">
                                    No Account Yet?
                                    <a href="./register.php" class="text-warning">Register</a>
                                </span>
                            </div>

>>>>>>> 4fd727baf874207cff1257c2e351ee4379a2f34e:login.php
                            </div>  
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>   
  
    <div class="col-md-5 mx-auto"> 
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
            <!-- Footer --> 

            <footer class="sticky-footer bg-white fixed-bottom">
                
                <a class="d-flex justify-content-center"> 
                   <div class="mx-3"> Copyright &copy; Arada Subcity 2021 </div>
                </a>  
                  
            </footer>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>  
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables2/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables2/dataTables.bootstrap4.min.js"></script>
     
    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>