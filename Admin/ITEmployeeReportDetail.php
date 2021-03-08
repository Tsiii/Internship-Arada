<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?> 

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="window.print()"><i
                class="fas fa-download fa-sm text-white-50"> 
            </i> Print
        </a>
    </div>

    <!--Select IT Employee Row-->
    <div class="row">  
        <div class="col-lg-6 mb-3" >   
            <div class="card shadow" style="margin: 0 auto;"> 
                <div class="card-body bg-dark border-left-danger ">
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
                        <button class="btn btn-success float-right" type="submit" name="submitemployee">Print</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
       
    <?php 
    if (isset($_POST["submitemployee"])) { 

        $res0 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' ");
        $result = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' ");
        $row = mysqli_fetch_array($result);
        $row1 = mysqli_num_rows($res0);

        $result2 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND Request_Status = 'MAINTAINED' ");
        $row2 = mysqli_num_rows($result2);
        
        //To Use Formal Name of the IT Employee
        $res = mysqli_query($db, "SELECT * FROM user WHERE User_Namee = '$_POST[assignto]' ");
        $row12 = mysqli_fetch_array($res);
        $row13 = mysqli_num_rows($res);

        $countPending= mysqli_query($db, " SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND Request_Status != 'MAINTAINED' ");
        $countPendings =mysqli_num_rows($countPending);

        $countMaintained= mysqli_query($db, " SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND Request_Status = 'MAINTAINED' ");
        $countMaintaineds =mysqli_num_rows($countMaintained);

        $countAll = mysqli_query($db, "SELECT COUNT(Services) as totall FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' ");
        $countAlls = mysqli_fetch_assoc($countAll);
        $countAllss = $countAlls['totall'];


        if ($countAllss == 0){ 
            $completedinpercent = 0;
        } 
        elseif ($countAllss !== 0) { 
            $completedinpercent = $countMaintaineds / $countAllss * 100; 
            
        }
        
        $position=4;  
        $readPercent= $completedinpercent;
        $completedinpercents = substr($readPercent, 0, $position);
             
        
        $service22 = mysqli_query($db, "SELECT COUNT(Ticket_Number), Services FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND Request_Status = 'MAINTAINED'  GROUP BY ID HAVING COUNT(ID) > 0;   ");

        $ttotal_cost = 0;  
        $total_item = 0 ;  
        $totalearning  = 0 ;  

        while ($rowq=mysqli_fetch_assoc($service22)) {  

            $quantity  = $rowq["COUNT(Ticket_Number)"]; 
            
            $services2= mysqli_query($db,"SELECT Cost FROM services WHERE Services = '$rowq[Services]' ");
            while ($rowq2=mysqli_fetch_assoc($services2)) {
                        
                $sumCost = $quantity * $rowq2["Cost"] ; 

                $totalearning  +=   $sumCost;

                $total_item += $quantity; 
            }  
        }  ?>  

        <!-- Content Row -->
        <div class="row"> 

            <!-- Earnings (Monthly) Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $totalearning; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <!--  Total Requests Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countAllss; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Requests Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Requests 
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $completedinpercents ?>%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: <?php echo $completedinpercent?>%" aria-valuenow="<?php echo $completedinpercent?>" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
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

            <!-- Pending Requests Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Pending Requests</div>
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

        <!-- Report Row -->
        <div class="row border-left-success"> 

            <!-- IT Employee Report Column -->
            <div class="col-lg-12 mb-3" >   
                <div class="card shadow  border-left-dark ">   
                    <?php
                    if ($row1 == 0) {
                        ?> 
                        <div class="card-body ">
                            <div class="text-center"> No data has been recorded by  <?php echo $_POST['assignto'] ?> </div>
                        </div>
                        <?php
                    }  
                    elseif ($row1 > 0) {
                        ?>   
                        <div class="card-body">    
                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1 text-center"> <?php echo $row12['First_Name'].' '.$row12['Middle_Name']?> </div> 

                            <?php
                            if ($row2 == 0) {
                            ?>   
                                <div class="text-center text-danger ">  No Request has been Completed by  <?php echo $_POST['assignto'] ?> </div>
                                
                            <?php
                            }   
                        
                            elseif ($row2 > 0) { ?>
                                
                                <div class="text-lg font-weight-bold text-dark text-uppercase mb-1 "> Maintained</div> 
                                
                                <div class="table-responsive"> 
                                    <table class='table table-bordered'> 
                                        <thead>  
                                            <tr>                  
                                                <th> Service Type </th> 
                                                <th> Quantity </th>   
                                                <th> Unit Cost</th>
                                                <th> Total Cost</th>  
                                            </tr>
                                        </thead>
                                        
                                        <tbody>  
                                            <?php  
                                            $service = mysqli_query($db, "SELECT COUNT(ID), Services FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' AND Request_Status = 'MAINTAINED' GROUP BY Services HAVING COUNT(ID) > 0; ");
                                                                            
                                            $total_cost = 0;               
                                            $s_total_cost = 0; 
                                            $total_item = 0;
                                            $total_quantity = 0 ;               
                                            while ($rowq=mysqli_fetch_assoc($service)) {  

                                                $quantity  = $rowq["COUNT(ID)"];  ?> 
                                                
                                                <tr>   
                                                    <td> <?php echo $rowq["Services"]; ?>  </td> 
                                                    <td> <?php echo $rowq["COUNT(ID)"]; ?>  </td>
                                                    
                                                    <?php 

                                                    $services2= mysqli_query($db,"SELECT Cost FROM services WHERE Services = '$rowq[Services]' ");
                                                    while ($rowq2=mysqli_fetch_assoc($services2)) {
                                                         
                                                        $unitCost = 1 * $rowq2["Cost"] ;
                                                        $sumCost = $quantity * $rowq2["Cost"] ;

                                                        $total_quantity += $quantity; 
                                                        $total_cost += $sumCost;
                                                         
                                                        $s_total_cost += $unitCost;
                                                        ?>

                                                        <td> <?php echo $unitCost; ?>  </td> 
                                                        <td> <?php echo $sumCost; ?>  </td>  
                                                    
                                                    <?php   
                                                    }
                                                    ?>  
                                                </tr>
                                                <?php
                                            }     
                                            ?>   
                                        </tbody>
                                    </table>

                                    <div class="text-dark mt-2 mb-4 float-right ">
                                        <i class="text-lg alert alert-success ">Total Item: <?php echo $total_quantity;?></i>  
                                        <i class="text-lg alert alert-warning ">Total Cost: <?php echo $total_cost;?></i>  
                                    </div>  
                                </div> 
                                <?php 
                            }?> 

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
                                        $result = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]' ");
                                            
                                        
                                        $unitCost = 0;
                                        $totalCost = 0 ;
                                        $total_cost = 0;            
                                        $s_total_cost = 0; 
                                        $total_item = 0;   
                                        $tCost = 0 ;  
                                         
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
                                                        $service = mysqli_query($db, "SELECT COUNT(ID), Services FROM maintenancerequest WHERE Assigned_To = '$_POST[assignto]'  GROUP BY Ticket_Number HAVING COUNT(ID) > 0; ");
                                                            
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
                        </div>  
                                            
                        <?php
                    } 
                    else {
                        ?>   
                        <div class="card-body "> 
                            <div class="text-center"> ERORRRRR  </div>
                        </div>
                        
                        </div>
                        </div>  
                        </div>
                        <?php   
                    } 
                    ?> 
                </div>
            </div>  
        </div> 

        <?php  
    }  ?>

</div>    

<?php   
    include("footer.php");     
?> 