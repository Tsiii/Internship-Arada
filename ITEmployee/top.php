<?php 
    include("../includes/server.php");  
            
    $notifications=0;
    $res= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='All' AND Request_Status !='MAINTAINED' ");
    $notifications =mysqli_num_rows($res);   

    $requests=0;
    $res= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
    $requests =mysqli_num_rows($res); 
    
    if($requests > 0 ){
        $requester= mysqli_query($db,"SELECT User_Namee FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
        $requesters =mysqli_fetch_array($requester);  
    }

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

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            $290.29 has been deposited into your account!
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">7</span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                problem I've been having.</div>
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
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                alt="">
                            <div class="status-indicator bg-warning"></div>
                        </div>
                        <div>
                            <div class="text-truncate">Last month's report looks great, I am very happy with
                                the progress so far, keep up the good work!</div>
                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div>
                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                told me that people say this to all dogs, even if they aren't good...</div>
                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                </div>
            </li> 

            <!-- Nav Item - Order -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-globe fa-fw"></i>
                    <!-- Counter - Order --> 
                    <?php 
                    if ($requests < 1) {
                        echo '<span class="badge badge-danger badge-counter"><?php echo $requests;?></span> ';
                    }
                    ?>
                </a>

                <?php 
                if($requests > 0 ){

                    $requester= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
                    $requesterss =mysqli_fetch_array($requester);  
 
                    $result1 = mysqli_query($db,"SELECT * FROM maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND maintenancerequest.User_Namee= '$requesterss[User_Namee]' AND  Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
                    $req =mysqli_fetch_array($result1);  
                    ?>  
                    <!-- Dropdown - Order -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Order Center
                        </h6>
                        <?php
                        $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND  Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' LIMIT 3   ");
     
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
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
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
    <?php 

    /* 
        <!-- Topbar Search
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

        

        /*
            while($row= mysqli_fetch_array($results)) {
                echo $row['item'];
                echo $row['movie']; 
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="<?php echo $row2["User_Image"]; ?>"
                                alt="user image">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! <?php echo $requesterss["Request_Description"]; ?>  </div>
                            <div class="small text-gray-500"><?php echo $requesterss["User_Namee"]; ?> · 58m</div>
                        </div>
                    </a> 
                    <?php  
            }  

            while($row= mysqli_fetch_array($results)) {
                echo $row['User_Namee']; 
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?php echo $row2["User_Image"]; ?>"
                            alt="user image">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! <?php echo $requesterss["Request_Description"]; ?>  </div>
                        <div class="small text-gray-500"><?php echo $requesterss["User_Namee"]; ?> · 58m</div>
                    </div>
                </a> 
                <?php  
            }  

        $requestersss= mysqli_query($db,"SELECT User_Image FROM user WHERE User_Namee = '$requesterss[User_Namee]' ");
        $requesterImage =mysqli_fetch_array($requestersss); 
            
        $results = mysqli_query($db,"SELECT User_Image.user, Request_Description.maintenancerequest, User_Namee.maintenancerequest FROM (SELECT * FROM user  ) user, (SELECT * FROM maintenancerequest ) maintenancerequest ");
        $row= mysqli_fetch_array($results);
        echo $row['username'];
            
        $resultss = mysqli_query($db, "SELECT User_Namee FROM maintenancerequest, user WHERE User_Namee = $requesterss[User_Namee]  ");
        $row= mysqli_fetch_array($resultss);
        echo $row['User_Namee'];
    */

         
    /*
        $infos = mysqli_fetch_array($res) ;

        echo  $infos["Requested_Date"].'<br>';

        $first_date = new DateTime("2012-11-30 17:03:30");
        $second_date = new DateTime("2012-12-21 00:00:00");
        $difference = $first_date->diff($second_date);
        //echo '<br>' .$difference. '<br>';

        $date1 =  $infos["Requested_Date"];
        $date2 = date('Y-m-d H:i:s');
        $interval = $date1->diff($date2);
        echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

        // shows the total amount of days (not divided into years, months and days like above)
        echo "difference " . $interval->days . " days ";
        */
        //echo date('Y-m-d H:i:s') - date('Y-m-d H:i:s', strtotime($infos["Requested_Date"])) . '<br>';

    /*

    $mytime = date("Y-m-d", strtotime($infos["Requested_Date"])).'<br>';
  
    $time = $infos["Requested_Date"]; 

    function get_time_ago( $time ){
        $time_difference = time() - $time;

        if( $time_difference < 1 ) {
            return 'less than 1 second ago'; 
        }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                            30 * 24 * 60 * 60      =>  'month',
                            24 * 60 * 60           =>  'day',
                            60 * 60                =>  'hour',
                            60                     =>  'minute',
                            1                      =>  'second'
        );

        foreach( $condition as $secs => $str ) {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    } 

    echo "---".'<br>'; 

    echo get_time_ago( strtotime($infos["Requested_Date"]) );
    */


                            /*
                                $mytime = date("Y-m-d", strtotime($info["Requested_Date"])).'<br>'; 
                                $time = $req["Requested_Date"];  
                            
                                    $time_difference = time() - $info["Requested_Date"];
                            
                                    if( $time_difference < 1 ) {
                                        return 'less than 1 second ago'; 
                                    }
                                    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                                                        30 * 24 * 60 * 60      =>  'month',
                                                        24 * 60 * 60           =>  'day',
                                                        60 * 60                =>  'hour',
                                                        60                     =>  'minute',
                                                        1                      =>  'second' ); 
                                    foreach( $condition as $secs => $str ) {
                                        $d = $time_difference / $secs;
                            
                                        if( $d >= 1 )
                                        {
                                            $t = round( $d );
                                            return ' ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
                                        }
                                    }   
                                echo strtotime($info["Requested_Date"]) ; 
                            */ 
?>