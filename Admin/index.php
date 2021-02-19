<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?> 

<?php   

            
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


$countPending= mysqli_query($db," SELECT * FROM maintenancerequest WHERE Request_Status = 'PENDING' ");
$countPendings =mysqli_num_rows($countPending); 

$countMaintained= mysqli_query($db," SELECT * FROM maintenancerequest WHERE Request_Status = 'MAINTAINED' ");
$countMaintaineds =mysqli_num_rows($countMaintained);  


  
$countAll = mysqli_query($db, "SELECT COUNT(Services) as totall FROM maintenancerequest ");
$countAlls = mysqli_fetch_assoc($countAll); 
$countAllss = $countAlls['totall'];   


  
$countearning = mysqli_query($db, "SELECT COUNT(Services) as totall FROM maintenancerequest ");
$countearnings = mysqli_fetch_assoc($countearning); 
$countearningss = $countearnings['totall'];    

  
$countFormat = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE  Services = 'FORMAT' ");
$countFormats = mysqli_fetch_assoc($countFormat); 
$countFormatss = $countFormats['total'];   
 
$countHardware = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE  Services = 'HARDWARE' ");
$countHardwares = mysqli_fetch_assoc($countHardware); 
$countHardwaress = $countHardwares['total']; 

$countNetwork = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Services = 'NETWORK' ");
$countNetworks = mysqli_fetch_assoc($countNetwork); 
$countNetworkss = $countNetworks['total']; 

$countScreen = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Services = 'SCREEN' ");
$countScreens = mysqli_fetch_assoc($countScreen); 
$countScreenss = $countScreens['total'];  

$countSoftware = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Services = 'SOFTWARE INSTALLATION' ");
$countSoftwares = mysqli_fetch_assoc($countSoftware); 
$countSoftwaress = $countSoftwares['total']; 

$countUnknown = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Services = 'UNKNOWN' ");
$countUnknowns = mysqli_fetch_assoc($countUnknown); 
$countUnknownss = $countUnknowns['total']; 
 
$format  =  $countFormatss   * 250 ;
$hardware = $countHardwaress * 300 ;
$network  = $countNetworkss  * 100 ;
$screen   = $countScreenss   * 100 ;
$software = $countSoftwaress * 100 ;
$unknown  = $countUnknownss  * 100 ;
$totalearning = $format + $hardware + $network + $screen + $software + $unknown

?> 
 
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="window.print()"><i
                class="fas fa-download fa-sm text-white-50"> 
            </i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
 
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $totalearning  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countAllss ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Requests 
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $countMaintaineds?>%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?php echo $countMaintaineds?>%" aria-valuenow="<?php echo $countMaintaineds?>" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countPendings; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Content Row -->
    <div class="row">

        <!-- IT Employee Report Column -->
        <div class="col-lg-8 mb-3"> 
            <?php  
                $countAssigned= mysqli_query($db," SELECT * FROM maintenancerequest WHERE Assigned_To = 'AR-IT-001' ");
                $countAssigneds =mysqli_num_rows($countAssigned);  
            ?>

            <!-- Project Card Example -->
            <div class="card shadow  ">
                <div class="card-header border-left-dark py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                </div>
                <div class="card-body border-left-dark">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Select IT Employee</div>

                    <form class=" mb-2" name="form4" action="" method="post" style="display: flow-root; margin:0 auto; margin-top:15px; margin-bottom:15px;" >                  

                        <span class="float-left"> 
                            <select name='assignto' class="form-control selectpicker"> 
                                <?php
                                $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option  name='assignto' > ";
                                    echo $row["User_Namee"];
                                    echo "</option>";
                                }
                                ?> 
                            </select>  
                        </span> 
                        <button class="btn btn-primary float-right" type="submit" name="submitemployee">Generate Report</button>
                    </form> 

                <?php 
                if (isset($_POST["submitemployee"])) { 

                    if ($_POST["assignto"] !== "Select IT Employee"){
                        $res3 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' ");
                        $row = mysqli_fetch_array($res3); 
                        $row1 = mysqli_num_rows($res3);
                        
                        $res = mysqli_query($db, "SELECT * FROM user WHERE User_Namee = '$_POST[assignto]' ");
                        $row12 = mysqli_fetch_array($res); 
                        $row13 = mysqli_num_rows($res);


                        
                        $countFormat = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'FORMAT' ");
                        $countFormats = mysqli_fetch_assoc($countFormat); 
                        $countFormatss = $countFormats['total'];   
                        
                        $countHardware = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'HARDWARE' ");
                        $countHardwares = mysqli_fetch_assoc($countHardware); 
                        $countHardwaress = $countHardwares['total']; 

                        $countNetwork = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'NETWORK' ");
                        $countNetworks = mysqli_fetch_assoc($countNetwork); 
                        $countNetworkss = $countNetworks['total']; 

                        $countScreen = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'SCREEN' ");
                        $countScreens = mysqli_fetch_assoc($countScreen); 
                        $countScreenss = $countScreens['total'];  

                        $countSoftware = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'SOFTWARE INSTALLATION' ");
                        $countSoftwares = mysqli_fetch_assoc($countSoftware); 
                        $countSoftwaress = $countSoftwares['total']; 

                        $countUnknown = mysqli_query($db, "SELECT COUNT(Services) as total FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND  Services = 'UNKNOWN' ");
                        $countUnknowns = mysqli_fetch_assoc($countUnknown); 
                        $countUnknownss = $countUnknowns['total']; 
                        
                        $format  =  $countFormatss   * 100 ;
                        $hardware = $countHardwaress * 100 ;
                        $network  = $countNetworkss  * 100 ;
                        $screen   = $countScreenss   * 100 ;
                        $software = $countSoftwaress * 100 ;
                        $unknown  = $countUnknownss  * 100 ;
                        
                        ?> 

                        <div> 
                        
                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1 text-center"> <?php echo $row12['First_Name'].' '.$row12['Middle_Name']?> </div> 

                            <div class="text-md font-weight-bold text-success text-uppercase mb-4 ">counted <?php echo $row1;?></div>  

                            <p><i class="text-md text-success text-uppercase mb-1" >Format   = </i><i><?php echo $format   ?></i>  </p>
                            <p><i class="text-md text-success text-uppercase mb-1" >Hardware = </i><i> <?php echo $hardware ?></i> </p>
                            <p><i class="text-md text-success text-uppercase mb-1" >Network  = </i><i><?php echo $network  ?></i>  </p>
                            <p><i class="text-md text-success text-uppercase mb-1" >Screens  = </i><i> <?php echo $screen   ?></i> </p>
                            <p><i class="text-md text-success text-uppercase mb-1" >Software = </i><i> <?php echo $software ?></i> </p>
                            <p><i class="text-md text-success text-uppercase mb-1" >Unknown  = </i><i><?php echo $unknown  ?></i>  </p>
                            <p class="text-md text-success text-uppercase mb-1" >Total = <?php echo $format + $hardware + $network + $screen + $software + $unknown?> </p>
                        </div>

                        <?php
                        if ($row1 == 0) {
                            echo '<div class="text-center"> No data has been recorded by '. $_POST['assignto'] .' </div>';
                        }

                        elseif ($row1 == 1) {  
                            ?>  
                    
                            <div class="card-body "> 
                            
                                <div class="table-responsive"> 
                                    <table class='table table-bordered'> 
                                        <thead>  
                                            <tr>                  
                                                <th> Ticket Number </th> 
                                                <th> Woreda </th>
                                                <th> Services </th>
                                                <th> Computer Type </th>  
                                                <th> Assigned_To </th> 
                                                <th> Request Status </th> 
                                                <th> Requested Date </th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $position=10; // Define how many character you want to display. 
                                                $readDate= $row["Requested_Date"];
                                                $Date = substr($readDate, 0, $position); 
                                            ?> 
                                            <tr>   
                                                <td> <?php echo $row["Ticket_Number"]; ?>  </td>  
                                                <td> <?php echo $row["Woreda"]; ?>  </td> 
                                                <td> <?php echo $row["Services"]; ?>  </td> 
                                                <td> <?php echo $row["Computer_Type"]; ?>  </td>  
                                                <td> <?php echo $row["Assigned_To"]; ?>  </td>   
                                                <td> <?php echo $row["Request_Status"]; ?>  </td>                                                   
                                                <td> <?php echo $Date; ?>  </td>   
                                            </tr> 
                                        </tbody>
                                    </table> 
                                </div>
                            </div>  
                            <?php
                        } 

                        elseif ($row1 > 1) {
                            ?>  
                                <div class="table-responsive"> 
                                    <table class='table table-bordered'> 
                                        <thead>  
                                            <tr>                  
                                                <th> Ticket Number </th> 
                                                <th> Woreda </th>
                                                <th> Services </th>
                                                <th> Computer Type </th>  
                                                <th> Assigned_To </th> 
                                                <th> Request Status </th> 
                                                <th> Requested Date </th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row1=mysqli_fetch_array($res3)) {  

                                                $position=16; // Define how many character you want to display. 
                                                $readDate= $row1["Services"];
                                                $Services = substr($readDate, 0, $position);
                                                
                                                $position=10; // Define how many character you want to display. 
                                                $readDate= $row1["Requested_Date"];
                                                $Date = substr($readDate, 0, $position);
                                            ?>
                                                <tr>   
                                                    <td> <?php echo $row1["Ticket_Number"]; ?>  </td>  
                                                    <td> <?php echo $row1["Woreda"]; ?>  </td> 
                                                    <td> <?php echo $Services; ?>  </td> 
                                                    <td> <?php echo $row1["Computer_Type"]; ?>  </td>  
                                                    <td> <?php echo $row1["Assigned_To"]; ?>  </td>   
                                                    <td> <?php echo $row1["Request_Status"]; ?>  </td>                                                   
                                                    <td> <?php echo $Date; ?>  </td>   
                                                </tr>
                                                <?php
                                            } ?>
                                        </tbody>
                                    </table>  
                            </div>  
                            <?php
                        } 
                        
                        else{
                            echo 'ERORRRRR';
                        }
                    }
                    
                    elseif ($_POST["assignto"] == "Select IT Employee"){
                        echo "select an employee";
                    }
                } ?>
                </div>
                


            </div>
        </div> 
    </div>

</div>
<!-- /.container-fluid -->
 
<?php   
    
?>  


<?php   
    include("footer.php"); 
?>  