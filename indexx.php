<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>  

    <!--------- CSS --------- -->
	<link rel="stylesheet" href="../fontawesome5/css/all.min.css"> 
	<link rel="stylesheet" href="../css/bootstrap.min.css" /> 
    <link href="../css/navbar.css" rel="stylesheet" id="bootstrap-css">

	<!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
     
</head>
<body>
    <?php
    
    session_start();
    if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){ 
        echo "<script type='text/javascript'>alert(' LogIn');</script>";
        header( "location: login.php" );  
    }  
