<?php
    include("../includes/server.php");   
    session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IT Maintenance Management System </title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/nprogress.css" rel="stylesheet">
    <link href="../css/custom.min.css" rel="stylesheet">
 
	<!--------- CSS --------- -->
	<link rel="stylesheet" href="../fontawesome5/css/all.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css" /> 

	<!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</head>

<body class="nav-md">
    
<?php
	if(isset($_SESSION['username']) && $_SESSION["status"]="Accepted") {
        ?>
		<nav class="navbar navbar-inverse bg-dark">
			<ul class="nav justify-content-start">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<img src="<?php echo $_SESSION['image']; ?> " style: height=30; width=30;>
					</span>
				</button>
				<li class="nav-item">
					<a class="nav-link active" href="#"> <?php echo $_SESSION['username']; ?> </a>
				</li>
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="navbar-brand text-light" href="index.php" class="danger">Movie</a>
				</li>
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="nav-link" href="index.php" class="danger">Home</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="favorites.php">My Favorite<span class=" sr-only">(current)</span></a>
				</li>

				<a href="logout.php" type="submit" name="logout" class="btn btn-danger navbar-btn" >Logout </a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="open">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/user.png" alt="">AR-IT-ADMIN    
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li> 
            </ul>
        </nav> 
        <?php

	}
	elseif(!isset($_SESSION['username'])&& empty($_SESSION['username'])) {
        ?>
		<nav class="navbar navbar-inverse bg-dark">
			<ul class="nav justify-content-start">  </ul>

			<ul class="nav justify-content-end">
				<li class="nav-item active">
					<a class="navbar-brand text-light" href="index.php" class="danger">Movie Name</a>
				</li>
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item"> 
					<a class="btn btn-light navbar-btn" href="registration.php" type="submit" name="register" style="margin-right:25px;" >Register </a>
				</li> 


				<li class="nav-item">
					<a href="login.php" type="submit" name="login" class="btn btn-danger navbar-btn " >LLogin </a>
				</li>
			</ul>
			
        </nav>';
        
        <?php
	}   	
	elseif(!isset($_SESSION['username'])&& empty($_SESSION['username']) || $_SESSION["status"]="Pending" || $_SESSION["status"]="Rejected"){
        ?>
		<nav class="navbar navbar-inverse bg-dark">
			<ul class="nav justify-content-start">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<img src="<?php echo $_SESSION['image']; ?>" style: height=30; width=30;>
					</span>
				</button> 
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="navbar-brand text-light" href="index.php" class="danger">Movie</a>
				</li>
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="nav-link" href="index.php" class="danger">Home</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="favorites.php">My Favorite</a>
				</li>

				<a href="login.php" type="submit" name="login" class="btn btn-custom navbar-btn" >Login </a>
			</ul>
		</nav>
        <?php
	} 
    ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>IT Maintenance Management System</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/user.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION["username"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                
                <div class="container" style="margin-top:30px">
                <div class="row">
                <div class="container-fluid " role="main" > 
            
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu" class="list-group">
                        <li class="list-group-item">
                            <a href="display_student_info.php"><i class="fa fa-home"></i> User Information 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li>
                        
                        <li class="list-group-item">
                            <a href="addbook.php" ><i class="fa fa-plus-square"></i> Add User
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="display_books.php"><i class="fa fa-desktop"></i> Display Requests 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="issuebooks.php"><i class="fa fa-plus-square"></i> Issue Request 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="return_book.php" ><i class="fa fa-mail-reply"></i> Maintained Request 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="book_detail_with_student.php"><i class="fa fa-bar-chart-o"></i> Request with all info 
                                <span class="fa fa-chevron-down"></span>
                            </a>
                        </li> 

                    </ul>
                </div>


            </div>

        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/user.png" alt=""><?php echo $_SESSION["librarian"];?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
