<?php
    include("security.php");
  
    include("sidemenu.php");
    include("top.php");
?>

<?php
    $res = mysqli_query($db, "SELECT * FROM user  WHERE User_Namee = '$_SESSION[username]'");
    $row=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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
    input,
    .form-control {
        border-radius: 30px;
    }

    .card-header {
        background-color: transparent;
        border-bottom: none;
    }
    .card {
        position: relative;
    }
    [class*="shadow"] {
        transition: all 0.2s ease;
    }  
    .shadow-sm {
        box-shadow: 0 2px 18px rgba(0, 0, 0, 0.02) !important;
    }
    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem 1.5rem;
    }
    .card { 
        display: flex;
        flex-direction: column;
        min-width: 0; 
        background-clip: border-box;
        border: 0.0625rem solid rgba(46, 54, 80, 0.125);
        border-radius: 0.5rem;
    }  
    .user-avatar.xl-avatar {
        height: 4.5rem;
        width: 4.5rem;
        min-height: 4.5rem;
        min-width: 4.5rem;
    }
    .user-avatar {
        height: 2.5rem;
        width: 2.5rem;
        min-height: 2.5rem;
        min-width: 2.5rem;
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 600;
        border-radius: 50%;
    }
    img {
        max-width: 100%;
    }

    .file-field span {
        cursor: pointer;
    }
    .icon {
        text-align: center;
        display: inline-flex; 
        align-items: center; 
        justify-content: center;
    }
    .icon span, .icon svg {
        font-size: 2rem;
    }
    .file-field span {
        cursor: pointer;
    }
    .file-field input[type="file"] {
        max-width: 230px;
        position: absolute;
        cursor: pointer; 
        opacity: 0;
        padding-bottom: 30px;
    } 
    .file {
    visibility: hidden;
    position: absolute;
}
</style>

<body>
    <div class="container-fluid" > 
        <div class="row">  

            <div class=" col-sm-12 col-md-8 col-lg-8 mb-4 pr-1 pl-3">
                <div class="card">
                    <div class="card-header mx-auto ">
                        <h5 class="title text-gray-900 ">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action='' method='POST'>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label>Department</label> 
                                        <select name="department" class="form-control selectpicker">
                                            <option  name='department' ><?php echo $row["Department"];?>
                                            <?php
                                            $res = mysqli_query($db, "SELECT Departments FROM department ");
                                            while ($row2=mysqli_fetch_array($res)) {
                                                echo "<option  name='department' > ";
                                                echo $row2["Departments"];
                                                echo "</option>";
                                            } ?> 
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-5 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" disabled=""
                                            placeholder="Username" value="<?php echo $row["User_Namee"];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" placeholder="Company"
                                            value="<?php echo $row["First_Name"];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Father Name</label>
                                        <input type="text" name="middlename" class="form-control"
                                            placeholder="Father Name" value="<?php echo $row["Middle_Name"];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control"
                                            placeholder="Father Name" value="<?php echo $row["Middle_Name"];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Phone"
                                            value="<?php echo $row["Phone"];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Woreda</label> 
                                        <select name="woreda" class="form-control"  required="">
                                            <option name='department' ><?php echo $row["Woreda"];?></option>
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
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="<?php echo $row["Email"];?>" required> 
                                    </div>
                                </div>
                            </div>
 
                            <div class="row">
                                <div class="col-md-4 pl-1 mt-2 mx-auto ">
                                    <div class="form-group"> 
                                        <input type="submit" name="saveEdit" class="form-control btn btn-sm btn-primary" value="Update Profile" >
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php 
                            if (isset($_POST['saveEdit'])) {  
                                $department = $_POST['department'];
                                $firstname = $_POST['firstname'];
                                $middlename = $_POST['middlename'];
                                $lastname = $_POST['lastname'];
                                $phone = $_POST['phone'];
                                $woreda = $_POST['woreda'];
                                $email = $_POST['email']; 
                                
                                $date = date('Y-m-d H:i:s');   
                                
                                
                                if(mysqli_query($db, "UPDATE user SET Department = '$department' ,First_Name = '$firstname' ,Middle_Name = '$middlename' ,Last_Name = '$lastname' ,Phone = '$phone' ,Woreda = '$woreda' ,Email= '$email' WHERE User_Namee ='$_SESSION[username]' ")){
                                    ?> 
                                    <div class="col-sm-4 col-md-4 col-lg-6 col-xl-4 text-center text-lg text-success" 
                                        style="margin: 0 auto; margin-bottom:10px;"> Profile Has Been Updated Successfully

                                    </div> 

                                    <style>
                                        #tohidetoassign {
                                            display: none;
                                        }
                                    </style>  
                                     
                                    <?php 
                                }
                                else{
                                    echo("Error description1: " . mysqli_error($db));   
                                }
                            }   
                            
                        ?>
                    </div>
                </div>
            </div> 

            <div class="col-sm-12 col-md-4 col-lg-4 pl-1"  > 
                <div class="row">
                    
                    <div class="col-12 mb-2">
                        <style>
                            .card .profile-cover {
                                background-repeat: no-repeat;
                                background-position: top center;
                                background-size: cover;
                                height: 200px;
                            }
                            #example1 {
                                border: 2px solid black;
                                padding: 25px;
                                background: url(mountain.jpg);
                                background-repeat: no-repeat;
                                background-size: auto;
                            }

                            .rounded-top {
                                border-top-left-radius: 0.5rem !important;
                                border-top-right-radius: 0.5rem !important;
                            }
                            .user-avatar.large-avatar {
                                border: 2px solid #ffffff;
                                height: 10rem;
                                width: 10rem;
                                min-height: 10rem;
                                min-width: 10rem;
                            }
                            .user-avatar {
                                height: 2.5rem;
                                width: 2.5rem;
                                min-height: 2.5rem;
                                min-width: 2.5rem;
                                color: #ffffff;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                font-weight: 600;
                                border-radius: 50%;
                            }
                            .rounded-circle {
                                border-radius: 50% !important;
                            }
                            .mt-n7 {
                                margin-top: -8rem !important;
                            }
                        </style>

                        <div class="card border-light text-center p-0">
                            <div class="profile-cover rounded-top" 
                                style="background-image: url(&quot;../images/yeka.jpg&quot;); background-size: cover; background-repeat:   no-repeat; background-position: center center;">
                            </div>
                            
                            <div class="card-body"  style="padding-top: 50px;">
                                <img  id="preview" src="<?php echo $row["User_Image"]; ?>" class="user-avatar large-avatar rounded-circle 
                                    mx-auto mt-n7 mb-4" alt="<?php echo $row["First_Name"]; ?>" style="width: 100px; height: 200px;" >
                                <h4 class="h3"><?php echo $row["First_Name"].' '.$row["Middle_Name"]; ?></h4>
                                <h5 class="font-weight-normal"><?php echo $row["Department"]; ?></h5>
                                <p class="text-gray ">Woreda <?php echo $row["Woreda"]; ?></p>
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
                                        <img class="rounded" id="preview2" src="<?php echo $row["User_Image"]; ?>" alt="change avatar">

                                    </div>
                                </div>
                                <div class="file-field">
                                    <div class="d-flex justify-content-xl-center ml-xl-3">
                                        <div class="d-flex"> 
                                            <div class="d-flex">
                                                <span class="icon icon-md"> 
                                                    <form action='' method='POST' enctype="multipart/form-data" >   
                                                        <input class="inputfile" type="file" name="fileToUpload" accept="image"> 
                                                        <span class="fas fa-paperclip mr-3"> </span>
                                                </span> 
                                            </div> 
                                            
                                            <div class="d-md-block text-left">
                                                <div class="font-weight-normal text-dark mb-1">Choose Image</div>
                                                <div class="text-gray small">JPG, JPEG or PNG.  </div>
                                                    
                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file"> 
                                                </div>
                                                <input type="submit" name="submitImage" class="form-control btn btn-sm btn-primary" value="Update Picture" >
                                            </div>

                                            </form> 
                                        </div>
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
                                                                        window.location="EditProfile.php"; 
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
                    </div>
                </div>
            </div> 
            
             </div>
    </div>
  
  
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
            document.getElementById("preview2").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>

<?php
    include('footer.php');
?>
