<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsion</title>
 
    <!--------- CSS --------- -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/fontawesome.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../fontawesome5/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/na.css" rel="stylesheet" id="bootstrap-css">
        
    <!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>   
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
     
</head>
<body>
                
    <nav class="navbar navbar-icon-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                <i class="fa fa-home"></i>
                Home
                <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="far fa-envelope">
                    <span class="badge badge-danger">2</span>
                </i>
                Link
                </a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-envelope">
                    <span class="badge badge-primary">10</span>
                </i>
                Dropdown
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            </ul>
            <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-bell">
                    <span class="badge badge-info">3</span>
                </i>
                Notification
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-globe">
                    <span class="badge badge-success">5</span>
                </i>
                Order
                </a>
            </li>
            </ul> 
        </div>
    </nav>
