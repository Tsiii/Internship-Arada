

    $notifications = 0;
    $notification = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To = '$_SESSION[username]' AND Request_Status = 'PENDING' OR Assigned_To = 'All' AND Notification_IT NOT LIKE '%$_SESSION[username]%'  ");
    $notifications = mysqli_num_rows($notification); 


    $note = mysqli_query($db,"SELECT * FROM maintenancerequest  WHERE  Assigned_To ='$_SESSION[username]' AND Request_Status = 'PENDING' OR Assigned_To = 'All' AND Notification_IT != '%$_SESSION[username]%' limit 3 ");


    <a class="dropdown-item d-flex align-items-center" href="DisplayRequest.php" onclick="<?php mysqli_query($db, "UPDATE maintenancerequest SET Notification_IT = CONCAT(Notification_IT, ', ' , '$_SESSION[username]') WHERE  Notification_IT NOT LIKE '%$_SESSION[username]%' AND Ticket_Number = '$infos[Ticket_Number]' "); ?>">



    $date=date("Y-m-d H:i:s");
        
        $date1=date_create($infos["Requested_Date"]);
        $date2=date_create($date);
        $diff=date_diff($date1,$date2);
         
        
        if ($diff->format(" %a days Ago") > 365) {
            echo $diff->format( " %Y Year Ago");
        }
        elseif ($diff->format(" %a days Ago") > 29 && $diff->format(" %a days Ago") <= 365) {
            echo $diff->format( " %m Month Ago");
        }
        elseif ($diff->format(" %a Days Ago") < 29 && $diff->format(" %a Days Ago") > 0 ) {
            echo $diff->format( " %a Days Ago");
        } 
        elseif ($diff->format(" %a Days Ago") == 0 && $diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24 ) {
            echo $diff->format(" %H Hour Ago");
        }
        elseif ($diff->format(" %a days Ago") == 0 && $diff->format(" %H hour Ago") < 1 && $diff->format(" %i Minute Ago") <= 60  ) {
            echo $diff->format(" %i Minute Ago");
        }  else{ 
            // %a outputs the total number of days
            echo $diff->format( " %a Day  Ago");
        } 





    
        /*$ticketnumber = $_GET["ticketnumber"];

if(mysqli_query($db, "UPDATE maintenancerequest SET Notification_E = 'Seen' WHERE Ticket_Number = $ticketnumber") ){
    header("location:javascript://history.go(-1)");

    ?>
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
    <?php
}

*/ 

 


        /*
onclick="<?php mysqli_query($db, "UPDATE maintenancerequest SET Notification_E = 'Seen' WHERE User_Namee ='$_SESSION[username]' AND Ticket_Number = '$info2[Ticket_Number]' "); ?>"


    <script type="text/javascript">
        window.location = "../DisplayRequest.php";
    </script>

     href="./includes/NotificationSeen.php?ticketnumber=<?php echo $info2['Ticket_Number']; ?>"
     //href="./includes/approve.php?id=<?php echo $row["ID"]; "
*/
 














        
            <!-- Nav Item - Order -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                     
                <?php 
                if($requests > 0 ){

                    $requester= mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' ");
                    $requesterss =mysqli_fetch_array($requester);  
 
                    $result1 = mysqli_query($db,"SELECT * FROM maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND maintenancerequest.User_Namee= '$requesterss[User_Namee]' ");
                    $req =mysqli_fetch_array($result1);  
                    ?>
                    
                        <!-- Counter - Order
                        <span class="badge badge-success badge-counter"><?php// echo $requests;?></span>  -->
                    </a>

                    <!-- Dropdown - Order -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Order Center
                        </h6>
                        <?php
                        $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND Assigned_To ='$_SESSION[username]' AND Request_Status = 'PENDING' AND Notification_IT = 'Not_Seen' LIMIT 3   ");
     
                        while ($infos = mysqli_fetch_array($data)) { 
 
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
                                         
                                        /*if ($diff->format(" %i Minute Ago") <= 60  ) {
                                            echo $diff->format(" %i Minute Ago");
                                        }
                                        if ($diff->format(" %H hour Ago") > 0 && $diff->format(" %H hour Ago") < 24 ) {
                                            echo $diff->format(" %H Hour Ago");
                                        }
                                        else*/
                                        if ($diff->format(" %a Days Ago") < 29) {
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
                    </a>
                    <!-- Dropdown - Order -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Order Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#"> 
                            <div class="font-weight-bold">
                                <div class="text-truncate text-center">You Don't Have New Orders .</div> 
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </li> 
            onclick="window.location='displayrequest.php'; "



            
    /*if($requests > 0 ){
        $requester= mysqli_query($db,"SELECT User_Namee FROM maintenancerequest WHERE Assigned_To ='$_SESSION[username]' AND Request_Status !='MAINTAINED' LIMIT 2 ");
        $requesters =mysqli_fetch_array($requester);  
    } */

    onclick='<?php mysqli_query($db, "UPDATE maintenancerequest SET Notification_E = 'Seen' WHERE Ticket_Number = '$info2[Ticket_Number]' "); ?>'>



    <a class="dropdown-item d-flex align-items-center"
                                            onclick="document.getElementById('myForm').submit(); return false;" >

                                            onclick="document.forms[0].submit();return false;" 

                                            document.getElementById("tsion").submit();

<a class="dropdown-item d-flex align-items-center" href="javascript:{}" onclick="document.getElementById('tsion').submit(); return false;">
 

 
<a class="dropdown-item d-flex align-items-center" href='<?php  $_SERVER["PHP_SELF"]; ?>' name="formnote" 
                                           onclick="this.form.submit()" >  




                                            onclick=" '. mysqli_query($db, "UPDATE maintenancerequest SET Notification_E = 'Seen' WHERE Ticket_Number = '$info2[Ticket_Number]' ").' ">'; ?>


                                            or die(mysql_error());


    <script type="text/javascript">
    document.getElementById("tsion").addEventListener("submit", function(event){
        event.preventDefault();
    });
</script>


UPDATE `user` SET `User_Image` = '../Image/bg5.jpg' WHERE `user`.`User_Namee` = 'AR-EMPLOYEE-002';

SELECT * FROM maintenancerequest,user WHERE Assigned_To ='AR-IT-004' AND Request_Status = 'PENDING' OR Assigned_To = 'All' AND Notification_IT NOT LIKE '%AR-IT-004' AND maintenancerequest.User_Namee = user.User_Namee

SELECT * FROM maintenancerequest,user WHERE maintenancerequest.User_Namee = user.User_Namee AND Assigned_To ='AR-IT-004' AND Request_Status = 'PENDING' OR Assigned_To = 'All' AND Notification_IT NOT LIKE '%AR-IT-004'

UPDATE `maintenancerequest` SET Notification_IT = 'Not_Seen'

SELECT * FROM maintenancerequest WHERE Ticket_Number = '202103021' AND Notification_IT LIKE '%AR-IT-004%'

















FROM IT EMPLOYEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE




<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-file-download fa-fw"></i>
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
        <span class="badge badge-warning badge-counter">7</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
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
        $note = mysqli_query($db,"SELECT * FROM maintenancerequest,user WHERE Assigned_To ='$_SESSION[username]' AND Request_Status = 'PENDING' OR Assigned_To = 'All' AND Notification_IT NOT LIKE '%$_SESSION[username]%' AND maintenancerequest.User_Namee = user.User_Namee limit 3 ");

        while ($infos = mysqli_fetch_array($note)) {?>
            
            <form action="./includes/NotificationSeen.php" method="post">
                <input type="text" name="ticketnumber" id="ticketnumber" value="<?php echo $infos['Ticket_Number'] ?>" hidden>
                <button type="submit" name='seenN' class=" btn-link " >
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src=" <?php echo $infos['User_Image']; ?>"
                                alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate"> New <?php echo $infos["Services"]; ?> Request </div>
                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                        </div>
                    </a>
                </button>
            </form>
            <?php  
        }    ?>
                    
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