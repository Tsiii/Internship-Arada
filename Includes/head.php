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
  
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fontawesome5./css/all.min.css" rel="stylesheet">
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

				<a href="logout.php" type="submit" name="logout" class=" pull-right btn btn-danger navbar-btn" >
					<i class=" fas fa-sign-out-alt pull-right"></i>Logout </a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="open">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/user.png" alt=""> <?php echo $_SESSION['username']; ?>   
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
					<a class="btn btn-light navbar-btn" href="../BEmployee/Register.php" type="submit" name="register" style="margin-right:25px;" >Register </a>
				</li> 


				<li class="nav-item">
					<a href="login.php" type="submit" name="login" class="btn btn-danger navbar-btn " >Login </a>
				</li>
			</ul>
			
        </nav>
        
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
