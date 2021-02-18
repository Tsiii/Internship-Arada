
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head> 
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
  
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion non-printable" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="sidebar-brand-text "> <?php echo $_SESSION['username'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
  
            <!-- Nav Item - Pages Collapse Menu --> 
            <li class="nav-item"> 
                 
                <a class="nav-link collapsed" href="DisplayUser.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-home"></i>
                    <span> User Information </span>
                </a>    
                
                <a class="nav-link collapsed" href="DisplayRequest.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-desktop"></i>
                    <span> Display Requests </span>
                </a> 
                <a class="nav-link collapsed" href="MaintenanceRequest.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                     
                    <i class="fa fa-plus-square"></i><span>  Issue Request</span>
                </a> 
                <a class="nav-link collapsed" href="ViewRequest.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                     
                    <i class="fa fa-eye"></i><span>  View a Request </span>
                </a> 
                <a class="nav-link collapsed" href="MaintainedRequest.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-check-circle"></i><span>  Maintained Requests</span>
                </a>  
            </li>
   

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Additions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>  
                        <a class="collapse-item" href="password.htmlphp">Forgot Password</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li> 

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"> 

                