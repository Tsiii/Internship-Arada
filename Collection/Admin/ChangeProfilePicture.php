<?php   
    include("security.php");   
   
    include("sidemenu.php"); 
    include("top.php"); 
?> 

 

<style> 

    .outer {
    width: 100% !important;
    height: 100% !important;
    max-width: 150px !important; /* any size */
    max-height: 150px !important; /* any size */
    margin: auto;  
    position: relative;
    }
    
    .inner {
    background-color: white;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    position: absolute;
    bottom: 0;
    right: 0;
    }

    .inner:hover {
    background-color: #55ff; 
    }
    .inner.fas{
        color: black;
    }
    .inputfile {
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: 1; 
    }
    .inputfile + label { 
        overflow: hidden; 
        line-height: 50px; 
    } 
</style>


<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >




    <main class="content">
        <style>
            .bell-shake.shaking {
                animation: bellshake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                transform-origin: top right;
            }  
            .icon-badge {
                display: inline-block;
                position: absolute;
                top: -11px;
                right: 6px;
                height: 7px;
                width: 7px;
                background-color: #FA5252;
            }
        </style>

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">
            <div class="container-fluid px-0">  
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark mr-lg-3 icon-notifications" data-unread-notifications="true" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-bell bell-shake"></span>
                                <span class="icon-badge rounded-circle unread-notifications"></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="text-center text-primary font-weight-bold border-bottom border-light py-3">Notifications</a>
                                <a href="../../pages/calendar.html" class="list-group-item list-group-item-action border-bottom border-light">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/team/profile-picture-1.jpg" class="user-avatar lg-avatar rounded-circle">
                                        </div>

                                        <div class="col pl-0 ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                                                </div>
                                                <div class="text-right">
                                                    <small class="text-danger">a few moments ago</small>
                                                </div>
                                            </div>
                                            <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul> 
            </div> 
        </nav>
    </main>










    <div class="row">  
        <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8" style="margin: 0 auto;">  
                    
            <div  style="margin:0 auto;"> 
                <div  style="text-align:center; ">
                    <div class="x_panel"  style="text-align:center;" >
                        <div class="x_title"> 
                            <h3>Change Profile Picture</h3>
                        </div>
                    </div>
        
                    <form action="" method="post" enctype="multipart/form-data" style="margin:0 auto; margin-top:15px; margin-bottom:15px;">
                        <?php
                            $res = mysqli_query($db, "SELECT * FROM user WHERE User_Namee ='$_SESSION[username]' ");
    
                            $row=mysqli_fetch_array($res);
                        ?>    
                        <div class="outer mb-4">              
                            <img class="rounded-circle " src="<?php echo $row["User_Image"]; ?>" alt=" " style="width: 140px; height: 140px;" >
                            <div class="inner">
                                <input class="inputfile" type="file" name="fileToUpload" accept="image"> 
                                <label class="fas fa-upload text-center" width="20" height="17" > </label>
                            </div>
                        </div>  
                                
                        <div class="col-sm-9 col-md-4 col-lg-6 col-xl-8" style="margin: 0 auto;">  
                            <input type="submit" class="form-control btn btn-sm btn-primary" value="Update Profile Picture" name="submitImage">
                        </div>
                    </form>
                    

                    <?php    
                    if (isset($_POST["submitImage"])) { 
                        if($_FILES["fileToUpload"]['error']){ 
                            echo '<div class="alert alert-danger" style="text-align:center; ">  File is Empty. </div>'; 
                        } 
                        else {
                            $tm = md5(time()); 
                            $fnm = $_FILES["fileToUpload"]["name"]; 
                            $dst1 = "../Image/".$tm.$fnm;
                            $dst = "../Images/".$tm.$fnm; 
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($dst1, PATHINFO_EXTENSION));
                            $moved = 0;

                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            
                            if ($check == false) {
                                echo '<div class="alert alert-danger " style="text-align:center; ">  File is not an image. </div>';
                                $uploadOk = 0;
                            }
                            // Check file size
                            elseif ($_FILES["fileToUpload"]["size"] > 500000) {
                                echo '<div class="alert alert-danger " style="text-align:center; ">  Sorry, your file is too large.</div>';
                                $uploadOk = 0;
                            }
                            // Allow certain file formats
                            elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  && $imageFileType != "gif") {
                                echo '<div class="alert alert-danger" style="text-align:center; ">  Sorry, only JPG, JPEG, PNG & GIF files are allowed. </div>';
                                $uploadOk = 0;
                            } 
                            elseif ($moved == 0) {
                                $moved = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dst);
                                if ($moved) {
                                    if (mysqli_query($db, " UPDATE user SET User_Image ='$dst1' WHERE User_Namee = '$_SESSION[username]' ")) {
                                        echo '<div class="alert alert-success" style="text-align:center; "> 
                                            You Have Updated Your Profile Picture Successfully
                                        </div>'; 
                                        ?> 
                                        <script type="text/javascript">
                                            window.location="ChangeProfilePicture.php"; 
                                        </script>

                                        <?php 
                                        if (copy($dst, $dst1)) { 
                                            $_SESSION["image"]= $dst1 ; 
                                        } 
                                        exit;
                                        unset($_POST);
                                    }
                                } else {
                                    echo "Not uploaded";
                                }
                            } else {
                                echo("Error description101: " . mysqli_error($db));
                            }
                        }
                    }
                    ?> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-body bg-white border-light shadow-sm mb-4">
                <h2 class="h5 mb-4">Select profile photo</h2>
                <div class="d-xl-flex align-items-center">
                    <div>
                        <!-- Avatar -->
                        <div class="user-avatar xl-avatar mb-3">
                            <img class="rounded" src="../assets/img/team/profile-picture-3.jpg" alt="change avatar">
                        </div>
                    </div>
                    <div class="file-field">
                        <div class="d-flex justify-content-xl-center ml-xl-3">
                            <div class="d-flex">
                                <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">
                                <div class="d-md-block text-left">
                                    <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                    <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-12 col-xl-4">
            
        </div>
        <div class="row"> 
            <div class="col-sm-9 col-md-7 col-lg-6 col-xl-8"> 

                <div class="col-6 mb-4">
                    <div class="card border-light text-center p-0">
                        <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg" style="background: url(&quot;../assets/img/profile-cover.jpg&quot;);"></div>
                        <div class="card-body pb-5">
                            <img src="../assets/img/team/profile-picture-1.jpg" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                            <h4 class="h3">Neil Sims</h4>
                            <h5 class="font-weight-normal">Senior Software Engineer</h5>
                            <p class="text-gray mb-4">New York, USA</p>
                            <a class="btn btn-sm btn-primary mr-2" href="#"><span class="fas fa-user-plus mr-1"></span> Connect</a>
                            <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                        </div>
                        </div>
                </div>
                <div class="col-6">
                    <div class="card card-body bg-white border-light shadow-sm mb-4">
                        <h2 class="h5 mb-4">Select profile photo</h2>
                        <div class="d-xl-flex align-items-center">
                            <div>
                                <!-- Avatar -->
                                <div class="user-avatar xl-avatar mb-3">
                                    <img class="rounded" src="../assets/img/team/profile-picture-3.jpg" alt="change avatar">
                                </div>
                            </div>
                            <div class="file-field">
                                <div class="d-flex justify-content-xl-center ml-xl-3">
                                    <div class="d-flex">
                                        <span class="icon icon-md"><span class="fas fa-paperclip mr-3"></span></span> <input type="file">
                                        <div class="d-md-block text-left">
                                            <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                            <div class="text-gray small">JPG, GIF or PNG. Max size of 800K</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>         
<?php 
    include('footer.php');   
?>     


<?php 

    /*
 
 
                    if(mysqli_query($db," UPDATE user SET User_Image ='$dst1' WHERE User_Namee = '$_SESSION[username]' ")){
                        
                        echo '<div class="alert alert-danger" style="text-align:center; "> 
                            YOU HAVE REGISTERED A USER SUCCESSFULLY </div>';
                                
                        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$dst);
                        move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$dst1);
                        echo $dst.'<br>';
                        
                        $_SESSION["image"]= $dst1 ;
                        echo $_SESSION['image'].'pppppppp<br>';  
 
                        if(copy($dst,$dst1)){
                            echo '<br>images/'.$_FILES['fileToUpload']['name'];
                            echo '{"status":"success"}';
                        }




                        exit;
                                
                        unset($_POST);
                    }  





        $target_dir = "../Image/";
        $target_dir2 = "../Image/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file2 = $target_dir2 . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        } 
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2 );
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    */

?>