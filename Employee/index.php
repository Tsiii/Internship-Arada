<?php   
   
    include("security.php");  
    include("sidemenu.php"); 
    
    //mysqli_query($db,"UPDATE maintenancerequest SET Notification_E = 'Seen'  WHERE User_Namee= '$_SESSION[username]'  ");
 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">  

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/home.css" rel="stylesheet" />

    <!--  style=" background: url(Images/forlogin.jpg) no-repeat center center fixed;" -->
</head>     
 

        <!-- Navigation-->
        <nav class="navbar navbar-expand navbar-dark fixed-top  topbar mb-4 static-top shadow" id="mainNav" style=" left: 224px; transition: padding-top 0.3s ease-in-out, padding-bottom 0.3s ease-in-out;">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Arada Subcity ICT</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#news">News</a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li> 
                    </ul>
                </div>
            </div>
        </nav> 
 
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome Back To Our Services!</div>
                <div class="masthead-heading text-uppercase">Submit Your Request !!</div> 
                <a class="btn btn-outline-warning btn-xl text-uppercase js-scroll-trigger mr-5" href="MaintenanceRequest.php">Request Maintenance</a>
            </div>
        </header>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-cog fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Computer Repair</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Hardware</h4>
                        <p class="text-muted">Hardware installations & upgrading memory, hard-drives, disc drives etc.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">computer application installation, configuration and networking, including printers and copy matchines.</p>
                    </div>
                </div>
            </div>
        </section> 

        <!-- Team--> 
        <section class="page-section" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted"> </h3>
                </div>
 
                <div id="demo" class="carousel slide" data-ride="carousel">   
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-group" style="background-color:transparent;">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                            <h4>Diana Petersen</h4>
                                            <p class="text-muted">Lead Developer</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-warning">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                            <h4>Larry Parker</h4>
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-success">
                                    <div class="card-body text-center"> 
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                            <h4>Kay Garland</h4> 
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
 
                        <div class="carousel-item">
                            <div class="card-group" style="background-color:transparent;"> 
                                <div class="card bg-warning">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                            <h4>Larry Parker</h4>
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-success">
                                    <div class="card-body text-center"> 
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                            <h4>Kay Garland</h4> 
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div> 
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                            <h4>Diana Petersen</h4>
                                            <p class="text-muted">Lead Developer</p> 
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
 
                        <div class="carousel-item">
                            <div class="card-group" style="background-color:transparent;">  
                                <div class="card bg-success">
                                    <div class="card-body text-center"> 
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                            <h4>Kay Garland</h4> 
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div> 

                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                            <h4>Diana Petersen</h4>
                                            <p class="text-muted">Lead Developer</p> 
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-warning">
                                    <div class="card-body text-center">
                                        <div class="team-member">
                                            <img class="mx-auto rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                            <h4>Larry Parker</h4>
                                            <p class="text-muted">Lead Marketer</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" style="width: 5%;" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a class="carousel-control-next" style="width: 10%;" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a> 
                </div> 

                <div class="row mt-2">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div> 
        </section>  

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Arada Subcity 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->


        <!-- Bootstrap core JS-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="../js/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
        <script src="../assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>

    </body>
</html>
