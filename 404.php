

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
     
    <!--------- CSS --------- -->
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/fontawesome.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="fontawesome5/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/na.css" rel="stylesheet" id="bootstrap-css">
        
    <!--------- SCRIPT ------  -->
    <script src="../js/jquery.min.js"></script>   
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 
</head>
<?php  
include("includes/server.php");  ?>
  
<body >
    <!-- Page Wrapper -->
    <div id="wrapper"> 

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style='height:700px; '> 

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card-body text-center " style="margin:auto;" > 
                        <div class="error mx-auto" data-text="404">404</div>
                            <p class="lead text-gray-800 mb-5">Page Not Found</p>
                            <p class="text-gray-500 mb-0">The page You are looking for is Not Available. </p>
                            <a href="index.html">&larr; Go Back </a>
                        </div>
                    </div>

                    <!-- 404 Error Text -->  
                    <div class="col-md-6 align-middle" style= "margin:auto; margin-top:100px;">
                        <div class="card">
                            <div class="card-body text-center justify-center" >
                                
                                <div class="error mx-auto" data-text="404">404</div>
                                    <p class="lead text-gray-800 mb-5">Page Not Found</p>
                                    <p class="text-gray-500 mb-0">The page You are looking for is Not Available. </p>
                                    <a href="index.html">&larr; Go Back </a>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->
 
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>