<?php 
    include("../includes/server.php");  
            
    $notifications=0;
    $notification= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='All' AND Request_Status !='MAINTAINED' ");
    $notifications1 =mysqli_num_rows($notification);   

    $requests=0;
    $res= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
    $requests =mysqli_num_rows($res); 
    
    if($requests > 0 ){
        $requester= mysqli_query($db,"SELECT User_Namee FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
        $requesters =mysqli_fetch_array($requester);  
    }

?>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow non-printable">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> 
             

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-download fa-fw"></i>
                    <!-- Counter - Messages fas fa-envelope -->
                    <span class="badge badge-danger badge-counter"><?php echo $notifications;?></span>
                </a>
                
                <?php 
                if ($notifications1 == 0) { ?> 

                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Centercddf
                        </h6>
                        <?php
                            $newrequests = mysqli_fetch_array($notification); 

                            // Perform a query, check for error
                             $note = mysqli_query($db,"SELECT * FROM  maintenancerequest WHERE Request_Status = 'PENDING' AND  Notification_E = 'Not_Seen'  ");
                            
                                while ($infos = mysqli_fetch_array($note)) {?>
                                
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3"> 
                                            <img class="rounded-circle" src="<?php echo $infos["User_Image"]; ?>" alt=" ">
                                         </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">New <?php echo $infos["Services"]; ?> Request </div>
                                            <div class="small text-gray-500">From <?php echo $infos["User_Namee"]; ?> · 58m</div>
                                        </div>
                                    </a> 
                                    <?php
                                }    
                                                                
                                echo '<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>';
 

                            /*
                                while ( $infos = mysqli_fetch_array($data)) { 
                                    ?>
                                
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="<?php echo $infos["User_Image"]; ?>"
                                                alt="hfg">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! <?php echo $infos["Request_Description"]; ?></div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                                alt="">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month, how
                                                would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                    <?php
                                }
                            */ ?>
                    </div>
                    <?php
                }
                else{?>
                
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" > 
                            <div class="font-weight-bold text-center"> 
                                <div class=" text-gray-900">No New Request That is Not Assigned.</div>
                            </div>
                        </a> 
                        <a class="dropdown-item text-center small text-gray-500" href="#">View More Messages</a>
                    </div>
                    <?php
                }?>
            </li> 

            <!-- Nav Item - Order -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-globe fa-fw"></i>
                     
                </a>

                <?php 
                if($requests > 0 ){

                    $requester= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
                    $requesterss =mysqli_fetch_array($requester);  
 
                    $result1 = mysqli_query($db,"SELECT * FROM maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND maintenancerequest.User_Namee= '$requesterss[User_Namee]' AND  Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
                    $req =mysqli_fetch_array($result1);  
                    ?>
                    
                    <!-- Counter - Order -->
                    <span class="badge badge-success badge-counter"><?php echo $requests;?></span> 

                    <!-- Dropdown - Order -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Order Center
                        </h6>
                        <?php
                        $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND  Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED'  LIMIT 3   ");
     
                        while ($info = mysqli_fetch_array($res) && $infos = mysqli_fetch_array($data)) { 
 
                            ?>  
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">  
                                    <img class="rounded-circle" src="<?php echo $infos["User_Image"]; ?>"  alt="">
                                         
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold"  onclick="window.location='displayrequest.php'; ">
                                     
                                    <div class="text-truncate">Hi there! <?php echo $infos["Request_Description"]; ?>  </div>
                                    <div class="small text-gray-500"><?php echo $infos["User_Namee"]; ?>    
                                        <?php

                                        $date=date("Y-m-d H:i:s");
  
                                        $date1=date_create($infos["Requested_Date"]);
                                        $date2=date_create($date);
                                        $diff=date_diff($date1,$date2);
                                          
                                        echo "<br>";
                                        /*if ($diff->format(" %i Minute Ago") <= 60  ) {
                                            echo $diff->format(" %i Minute Ago");
                                        }
                                        if ($diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24 ) {
                                            echo $diff->format(" %H Hour Ago");
                                        }
                                        else*/if ($diff->format(" %a Days Ago") < 29) {
                                            echo $diff->format(" %a Days Ago");
                                        }
                                        elseif ($diff->format(" %a days Ago") > 29 && $diff->format(" %a days Ago") <= 365) {
                                            echo $diff->format(" %m Month Ago");
                                        }
                                        elseif ($diff->format(" %a days Ago") > 365) {
                                            echo $diff->format(" %Y Year Ago");
                                        } else{ 
                                            // %a outputs the total number of days
                                            echo $diff->format(" %a Days Ago");
                                        }   
                                        ?> 
                                    </div> 
                                </div>
                            </a> 
                            
                            <?php 
                            }  
                        ?>
                        <a class="dropdown-item text-center small text-gray-500" href="displayrequest.php">Read More Messages</a>

                    </div> 
                    <?php 
                } 
                else{
                    ?>
                    <!-- Counter - Order -->
                    <span class="badge badge-counter"></span>
                    <!-- Dropdown - Order -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Order Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#"> 
                            <div class="font-weight-bold">
                                <div class="text-truncate text-center">You Don't Have Any Orders Yet.</div> 
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </li> 
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                    <img class="img-profile rounded-circle"
                        src="<?php echo $_SESSION['image'] ?>">
                     
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="EditProfile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>                            
    