<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?> 

<?php   
  
$result = mysqli_query($db, "SELECT * FROM maintenancerequest  ");
                                
$unitCost = 0;   
$total_item = 0;     
$total_cost = 0;  

while ($row1=mysqli_fetch_array($result)) {
                                        
    $services2= mysqli_query($db, "SELECT Cost FROM services WHERE Services = '$row1[Services]' ");
                                                
    while ($rowq2=mysqli_fetch_assoc($services2)) {

        $service = mysqli_query($db, "SELECT COUNT(ID), Services FROM maintenancerequest GROUP BY Ticket_Number HAVING COUNT(ID) > 0; ");
        $servicecomp = mysqli_query($db, "SELECT COUNT(Request_Status) FROM maintenancerequest WHERE Request_Status = 'MAINTAINED'   "); 
        $servicepend = mysqli_query($db, "SELECT COUNT(Request_Status) FROM maintenancerequest WHERE Request_Status = 'PENDING'   "); 
    
        $rowq=mysqli_fetch_assoc($service);
        $rowm=mysqli_fetch_assoc($servicecomp);
        $rowp=mysqli_fetch_assoc($servicepend);

        $quantity  = $rowq["COUNT(ID)"];  
        $quantityMaintained = $rowm["COUNT(Request_Status)"];
        $quantityPending = $rowp["COUNT(Request_Status)"];
  
        $unitCost = 1 * $rowq2["Cost"];
        $total_item += $quantity;
        $total_cost += $unitCost;
    } 
}  
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $total_cost  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Request (Total) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_item ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Request (Completed) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Requests 
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $quantityMaintained?>% </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?php echo $quantityMaintained?>%" aria-valuenow="<?php echo $quantityMaintained?>" aria-valuemin="0"
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $quantityPending; ?></div>
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
        <div class="col-lg-12 mb-3">  
            <!-- Project Card Example -->
            <div class="card shadow  ">
                <div class="card-header border-left-dark py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                </div>

                <div class="card-body border-left-dark"> 
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
                                $result = mysqli_query($db, "SELECT * FROM maintenancerequest  ");
                                
                                $unitCost = 0;   
                                $total_item = 0;     
                                $total_cost = 0;  

                                while ($row1=mysqli_fetch_array($result)) {
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

                                        <?php 
                                        
                                        
                                        
                                            $services2= mysqli_query($db, "SELECT Cost FROM services WHERE Services = '$row1[Services]' ");
                                            
                                            while ($rowq2=mysqli_fetch_assoc($services2)) {
                                                $service = mysqli_query($db, "SELECT COUNT(ID), Services FROM maintenancerequest GROUP BY Ticket_Number HAVING COUNT(ID) > 0; ");
                                                    
                                                while ($rowq=mysqli_fetch_assoc($service)) {
                                                    $quantity  = $rowq["COUNT(ID)"];
                                                }
                                                
                                                $unitCost = 1 * $rowq2["Cost"];
                                                $total_item += $quantity;
                                                $total_cost += $unitCost;
                                            }
                                            ?>                    
                                    </tr>
                                    <?php 
                                }   ?>
                            </tbody>
                        </table> 

                        <div class="text-dark mt-2 mb-3 float-right ">
                            <i class="text-lg alert alert-danger "> Total Item: <?php echo $total_item ; ?></i> 
                            <i class="text-lg alert alert-warning ">Total Cost: <?php echo $total_cost ;?></i>  
                        </div>  
                    </div>

        
                    <?php /*
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
                    } */?>
                </div> 
            </div>
        </div>

        <!-- Content Column -->
        <div class="col-lg-10 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span
                            class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span
                            class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span
                            class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span
                            class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span
                            class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
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