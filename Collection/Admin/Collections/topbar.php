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