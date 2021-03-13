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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                    <div class="card-header">
                        <span class="title text-gray-900 text-center mx-auto "><?php echo $row["First_Name"].' '. $row["Middle_Name"]; ?> </h5>
                        <a class="ml-1 float-right " href="EditProfile.php"><i class="far fa-edit mr-4"> Edit</a></i> 
                
                    </div>
                    <div class="card-body">
                        <form action='' method='POST'>
                            <div class="row">
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" disabled=""
                                            placeholder="Username" value="<?php echo $row["User_Namee"];?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Department</label> 
                                        <input type="text" name="team" class="form-control" disabled=""
                                            placeholder="Team" value="<?php echo $row["Department"];?>">  
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Team</label>
                                        <input type="text" name="team" class="form-control" disabled=""
                                            placeholder="Team" value="<?php echo $row["User_Namee"];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" disabled=""
                                         placeholder="Company" value="<?php echo $row["First_Name"];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Father Name</label>
                                        <input type="text" name="middlename" class="form-control" disabled=""
                                            placeholder="Father Name" value="<?php echo $row["Middle_Name"];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control"  disabled=""
                                            placeholder="Father Name" value="<?php echo $row["Middle_Name"];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" class="form-control" disabled=""
                                        placeholder="Phone"
                                            value="<?php echo $row["Phone"];?>" >
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Woreda</label> 
                                        <input type="tel" name="phone" class="form-control" disabled=""
                                            placeholder="woreda" value="<?php echo $row["Woreda"];?>" > 
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" disabled=""
                                            placeholder="Email" value="<?php echo $row["Email"];?>" required> 
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
                            
                            <div class="card-body ">
                                <img  id="preview" src="<?php echo $row["User_Image"]; ?>" class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4" alt="<?php echo $row["First_Name"]; ?>">
                                <h4 class="h3"><?php echo $row["First_Name"].' '.$row["First_Name"]; ?></h4>
                                <h5 class="font-weight-normal"><?php echo $row["Department"]; ?></h5>
                                <p class="text-gray">Woreda <?php echo $row["Woreda"]; ?></p>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div> 
            
             </div>
    </div>
  
 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
