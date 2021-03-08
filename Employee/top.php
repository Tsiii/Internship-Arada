<?php 
    include("../includes/server.php");   
   
    $notification = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE User_Namee ='$_SESSION[username]' AND Request_Status = 'ACCEPTED' AND Notification_E = 'Not_Seen' ");
    $notifications = mysqli_num_rows($notification);   
 
    $message = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE User_Namee='$_SESSION[username]' AND Request_Status != 'PENDING' AND Request_Status != 'ACCEPTED' AND Notification_E = 'Not_Seen' ");
    $messages = mysqli_num_rows($message);
   
?> 
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
 


            <!-- Nav Item - new added Messages  Like When request is Accepted-->
            <li class="nav-item dropdown no-arrow mx-1">

                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                    <i class="fas fa-envelope fa-fw"></i> 
                <?php 
                if ($notifications > 0) { ?>  

                        <!-- Counter - Messages fas fa-envelope -->
                        <span class="badge badge-warning badge-counter"><?php echo $notifications;?></span>
                    </a>

                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center 
                        </h6>
                        <style>
                            .btn-link {
                                width: 100%;
                                border: none;
                                outline: none;
                                background: none;
                                cursor: pointer; 
                                padding: 1.1px;
                                text-decoration: none;
                                font-family: inherit;
                                font-size: inherit;

                                
                                border-right: none #e3e6f0;  
                                border-bottom: none #e3e6f0;
                                border-left: none #e3e6f0;
                            }
                            .btn-link:focus,
                            .btn-link:hover,button:focus {
                                outline: none; 
                                text-decoration: none; 
                            }/*  .topbar .dropdown-list .dropdown-item {  
                               border-right: none #e3e6f0;  
                                border-bottom: none #e3e6f0;
                                border-left: none #e3e6f0;
                            }  */
                        </style>
                        

                        <?php
                            $newrequests = mysqli_fetch_array($notification); 

                            // Perform a query, check for error  
                            $note =  mysqli_query($db, "SELECT * FROM maintenancerequest WHERE User_Namee='$_SESSION[username]' AND Request_Status = 'ACCEPTED' AND Notification_E = 'Not_Seen' limit 3");
                            
                            $note1 =  mysqli_query($db, "SELECT * FROM maintenancerequest WHERE User_Namee='$_SESSION[username]' AND Request_Status != 'PENDING' AND Notification_E = 'Not_Seen' limit 3");
                            $info  = mysqli_fetch_array($note1); ?>  
                            
                            <i class="text-success"> Good News </i> 
                            
                            <style>
                                .btn-link {
                                    border: none;
                                    outline: none;
                                    background: none;
                                    cursor: pointer; 
                                    padding: 1.1px;
                                    text-decoration: none;
                                    font-family: inherit;
                                    font-size: inherit;
                                }
                                .btn-link:focus,
                                .btn-link:hover,button:focus {
                                    outline: none; 
                                    text-decoration: none; 
                                } 
                            </style>
                            
                            <?php 
                            while ($info2 = mysqli_fetch_array( $note)) {
                                if ($info2['Request_Status'] == "ACCEPTED") {?> 
                                    
                                    <form action="./includes/NotificationSeen.php" method="post">
                                    <input type="text" name="ticketnumber" id="ticketnumber" value="<?php echo $info2['Ticket_Number'] ?>" hidden>
                                        <button type="submit" name='seenN' class=" btn-link " >
                                            <a class="dropdown-item d-flex align-items-center">
                                                <div class="dropdown-list-image mr-3"> 
                                                    <div class="rounded-circle "> 
                                                        <i class="btn-circle btn-success fas fa-check"></i>
                                                    </div>
                                                </div>

                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><?php echo $info2['Ticket_Number'] ?> Has been <?php echo $info2['Request_Status'] ?>
                                                        </div>
                                                    <div class="small text-gray-500" >By <?php echo $info2['Assigned_To'] ?> <span class="text-warning ml-1"> 
                                                        <?php
                                                        $date=date("Y-m-d H:i:s");
                
                                                        $date1=date_create($info2["Assigned_Date"]);
                                                        $date2=date_create($date);
                                                        $diff=date_diff($date1, $date2);
                                                        
                                                        
                                                        if ($diff->format(" %a days Ago") > 365) {
                                                            echo $diff->format(" %Y Year Ago");
                                                        } elseif ($diff->format(" %a days Ago") > 29 && $diff->format(" %a days Ago") <= 365) {
                                                            echo  '<span class="text-danger "> '.$diff->format(" %m Month Ago").'</span';
                                                        } elseif ($diff->format(" %a Days Ago") < 29 && $diff->format(" %a Days Ago") > 0) {
                                                            echo $diff->format(" %a Days Ago");
                                                        } elseif ($diff->format(" %a Days Ago") == 0 && $diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24) {
                                                            echo $diff->format(" %H Hour Ago");
                                                        } elseif ($diff->format(" %a days Ago") == 0 && $diff->format(" %H hour Ago") < 1 && $diff->format(" %i Minute Ago") <= 60) {
                                                            echo $diff->format(" %i Minute Ago");
                                                        } else {
                                                            // %a outputs the total number of days
                                                            echo $diff->format(" %a Day  Ago");
                                                        }
                                                        ?> </span>

                                                    </div>
                                                </div>
                                            </a>
                                        </button>
                                    </form>
                                    <?php 
                                }
                            } 

                            if ($notifications > 3) {
                                echo '<a class="dropdown-item text-center small text-gray-500" href="DisplayRequest.php">Read More Messages</a>';
                            }
                            elseif ($notifications < 33 && $notifications > 0) {
                                // %a outputs the total number of days
                                echo '<a class="dropdown-item text-center small text-gray-500" href="Notification.php">View All Messages</a>';
                            } 
                        ?>
                    </div>
                    <?php
                }
                else{?>
                
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" > 
                            <div class="font-weight-bold text-center"> 
                                <div class=" text-gray-900">No New Message About request.</div>
                            </div>
                        </a> 
                        <a class="dropdown-item text-center small text-gray-500" href="DisplayRequest.php">View All Messages</a>
                    </div>
                    <?php
                }?>
            </li> 


            <!-- Nav Item - Messages Like When request is Maintained or Inprogress-->  
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-download fa-fw"></i>
                    <!-- Counter - Messages -->
                      

                <?php   
                    $messageD = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE User_Namee='$_SESSION[username]' AND Request_Status != 'PENDING' AND Request_Status != 'ACCEPTED' AND Notification_E = 'Not_Seen' ORDER BY RAND() limit 3 ");
 
                    $result1 = mysqli_query($db,"SELECT * FROM maintenancerequest, user  WHERE maintenancerequest.User_Namee = user.User_Namee  ");
                    $req =mysqli_fetch_array($result1); 
                    $req2 =mysqli_num_rows($result1); 

                    
                if($messages > 0 ){ ?>
                        <!-- Counter - Messages fas fa-file-download -->
                        <span class="badge badge-danger badge-counter"><?php echo $messages;?></span>
                    </a>

                    <!-- Dropdown - Messages --> 
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header"> Order Center </h6>
                        
                        <div class="font-weight-bold">
                            <div class="text-truncate pl-2"> Hello 
                                <?php echo $req['First_Name'] ?>
                            </div>
                        </div>
                        
                        <?php  
                        while ($info2 = mysqli_fetch_array($messageD)) {  
                            if ($info2['Request_Status'] == "MAINTAINED") {?>  
                                <form action="./includes/NotificationSeen.php" method="post">
                                    <input type="text" name="ticketnumber" id="ticketnumber" value="<?php echo $info2['Ticket_Number'] ?>" hidden>
                                    <button type="submit" name='seenN' class=" btn-link " >
                                        <a class="dropdown-item d-flex align-items-center mx-auto" href="#">
                                            
                                            <div class="font-weight-bold mx-auto" onclick="window.location='displayrequest.php'; ">
                                                <div class="text-truncate"> <?php echo $info2['Ticket_Number'] ?> has been <?php echo $info2['Request_Status'] ?></div>
                                                <div class="small text-gray-500"><?php echo $info2['Assigned_To'] ?> ·   <span class="text-warning ml-1"> 
                                                    <?php
                                                        $date=date("Y-m-d H:i:s");
                
                                                        $date1=date_create($info2["Requested_Date"]);
                                                        $date2=date_create($date);
                                                        $diff=date_diff($date1, $date2);
                                                        
                                                        
                                                        if ($diff->format(" %a days Ago") > 365) {
                                                            echo $diff->format(" %Y Year Ago");
                                                        } elseif ($diff->format(" %a days Ago") > 29 && $diff->format(" %a days Ago") <= 365) {
                                                            echo $diff->format(" %m Month Ago");
                                                        } elseif ($diff->format(" %a Days Ago") < 29 && $diff->format(" %a Days Ago") > 0) {
                                                            echo $diff->format(" %a Days Ago");
                                                        } elseif ($diff->format(" %a Days Ago") == 0 && $diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24) {
                                                            echo $diff->format(" %H Hour Ago");
                                                        } elseif ($diff->format(" %a days Ago") == 0 && $diff->format(" %H hour Ago") < 1 && $diff->format(" %i Minute Ago") <= 60) {
                                                            echo $diff->format(" %i Minute Ago");
                                                        } else {
                                                            // %a outputs the total number of days
                                                            echo $diff->format(" %a Day  Ago");
                                                        }
                                                    ?> </span>
                                                </div>
                                            </div>
                                        </a> 
                                    </button>
                                </form>
                                <?php
                            } 
                            else{ ?> 
                                <form action="./includes/NotificationSeen.php" method="post">
                                    <input type="text" name="ticketnumber" id="ticketnumber" value="<?php echo $info2['Ticket_Number'] ?>" hidden>
                                    <button type="submit" name='seenN' class=" btn-link " >
                                        
                                        <a class="dropdown-item d-flex align-items-center mx-auto" href="#">
                                        
                                            <div class="font-weight-bold mx-auto" style="margin-left: 28px!important;"  onclick="window.location='displayrequest.php'; ">
                                                <div class="text-truncate"> <?php echo $info2['Ticket_Number'] ?> Is <?php echo $info2['Request_Status'] ?></div>
                                                <div class="small text-gray-500" style="margin-left: 34px!important;" ><?php echo $info2['Assigned_To'] ?> . <span class="text-warning ml-1"> 
                                                    <?php
                                                        $date=date("Y-m-d H:i:s");
                
                                                        $date1=date_create($info2["Requested_Date"]);
                                                        $date2=date_create($date);
                                                        $diff=date_diff($date1, $date2);
                                                        
                                                        
                                                        if ($diff->format(" %a days Ago") > 365) {
                                                            echo $diff->format(" %Y Year Ago");
                                                        } elseif ($diff->format(" %a days Ago") > 29 && $diff->format(" %a days Ago") <= 365) {
                                                            echo $diff->format(" %m Month Ago");
                                                        } elseif ($diff->format(" %a Days Ago") < 29 && $diff->format(" %a Days Ago") > 0) {
                                                            echo $diff->format(" %a Days Ago");
                                                        } elseif ($diff->format(" %a Days Ago") == 0 && $diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24) {
                                                            echo $diff->format(" %H Hour Ago");
                                                        } elseif ($diff->format(" %a days Ago") == 0 && $diff->format(" %H hour Ago") < 1 && $diff->format(" %i Minute Ago") <= 60) {
                                                            echo $diff->format(" %i Minute Ago");
                                                        } else {
                                                            // %a outputs the total number of days
                                                            echo $diff->format(" %a Day  Ago");
                                                        }
                                                    ?> </span>
                                                </div>
                                            </div>
                                        </a> 
                                    </button>
                                </form>
                            <?php }
                        }   ?> 
                        <a class="dropdown-item text-center small text-gray-500" href="displayrequest.php">Read More Messages</a>
                    </div> 
                    <?php 
                } 
                else{
                    ?>
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
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
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
    <!-- End of Topbar -->    