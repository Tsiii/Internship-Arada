<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
<style>
    .list-group-item,
    .list-group-item a:hover{  
        text-decoration: none;
    }
    a:hover{  
        text-decoration: none;
    } 
    @media print
    {
        .non-printable { 
            display: none; 
        } 
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
        
    <!-- Page Heading -->
    <div class="non-printable d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> </h1>
        <a href="#"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="window.print()">
            <i class="fas fa-download fa-sm text-white-50"> </i> Generate Report</a>
    </div> 

    <!-- Page Heading -->
    <div class="x_panel" style="text-align:center;" >
        <h2 class="h3 mb-2 text-gray-800 " >Display Requests</h2>  
        
        <form name="form1" action="" method="post" id="tohidetoassign">
            <input type="text" name="ticketnumber" placeholder="Enter Ticket Number" required>
            <input type="submit" name="submit1" class="btn btn-primary" value="search Request"> 
        </form>  
    </div> 

    <?php 
    if (isset($_POST['submit1'])) {
        
        $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]' ");
    
        $resultCheck = mysqli_num_rows($result);
        $row5 = mysqli_fetch_array($result); 

        if( $resultCheck == 0 ){ 
            echo '<div class="h5 mb-5 text-danger" style="text-align:center; margin-top:15px;" >Wrong Ticket Number </div> '; 
        }  
        elseif($resultCheck !== 0){  
            $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$_POST[ticketnumber]' AND Assigned_To = ' $_SESSION[username]'"); 
            
            echo '<div class="h5 mb-5 text-danger" style="text-align:center; margin-top:15px;" >Assigned To Another Employee </div> '; 
        }   
        else{
            echo("Error description1: " . mysqli_error($db));  
        }
    }  
    else{  
        $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE  Assigned_To = 'All' OR Assigned_To = '$_SESSION[username]' ");
        ?> 
        <form>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>  
                                    <th>Ticket Number </th>
                                    <th>User Name </th>
                                    <th>Woreda </th>
                                    <th>Services </th>
                                    <th>Computer Type </th> 
                                    <th>Request Description </th>
                                    <th>Request Status </th>
                                    <th>Assigned To </th>
                                    <th>Requested Date </th>   
                                    <th>Change </th> 
                                </tr>
                            </thead> 
                            <tbody> 
                                <tr>
                                    <?php  
                                    while($row=mysqli_fetch_array($res)){
                                        ?>   
                                        <td> <?php echo $row["Ticket_Number"]; ?></td> 
                                        <td> <?php echo $row["User_Namee"]; ?></td>  
                                        <td> <?php echo $row["Woreda"]; ?> </td>
                                        <td> <?php echo $row["Services"]; ?> </td>
                                        <td> <?php echo $row["Computer_Type"]; ?> </td> 
                                        <td> <?php echo $row["Request_Description"]; ?></td>  
                                        <td> <?php echo $row["Request_Status"]; ?></td>  
                                        <td> <?php echo $row["Assigned_To"]; ?> </td>   
                                        <td><?php echo $row["Requested_Date"];?> </td>
                                        <td><?php if ($row["Request_Status"] == "PENDING" ) { ?>
                                                <a class="btn-circle btn-success fas fa-check " id="accept" href='AcceptRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>&&assignedto=<?php echo $_SESSION['username']?>&&services=<?php echo $row['Services']?>'></a> <?php
                                            }
                                            elseif ($row["Request_Status"] == "ACCEPTED") { ?> 
                                                <a class="btn-circle btn-warning fas fa-hourglass-half" id="inprogress" href=InProgress.php?ticketnumber=<?php echo $row["Ticket_Number"]?>&&assignedto=<?php echo $_SESSION['username']?>&&services=<?php echo $row['Services']?>'></a> 
                                                <a class="btn-circle btn-success far fa-calendar-check " id="maintained" href='Maintained.php?ticketnumber=<?php echo $row["Ticket_Number"]?> '> </a> <?php
                                            }
                                            elseif ($row["Request_Status"] == "INPROGRESS") { ?>
                                                <a class="btn-circle btn-success far fa-calendar-check " id="maintained" href='Maintained.php?ticketnumber=<?php echo $row["Ticket_Number"]?>'> </a> 
                                                <a  class=" btn-circle btn-danger far fa-calendar-times" href="RejectRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>"> </a> <?php
                                            }
                                            elseif ($row["Request_Status"] == "MAINTAINED") { ?> <?php
                                            }
                                            else{ ?> 
                                                <input type="submit" name="submit2" class="btn btn-primary" value="Save">   <?php
                                            }
                                        //<a class="btn-circle btn-danger fas fa-times "  href="delete_request.php?id=<?php echo $row["ID"] ?>
                                        </td>   
                                        
                                 </tr>
                                    <?php
                                    } ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </form> 
        
        <?php 
    }  
    ?> 
</div>   

<?php 
    include('footer.php');   
?>