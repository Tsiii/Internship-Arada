<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?>   
<style type="text/css">

@media print
{
    .non-printable { display: none; } 
}
</style>
 
<!-- Begin Page Content -->
<div class="container-fluid">  

    <!-- Page Heading --> 
    <div class="non-printable d-sm-flex align-items-center justify-content-between mb-4">  

        <p class="h3 mb-2 text-gray-800 " style="text-align:center;" >Display Requests</p>  
        
        <a href="#"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="window.print()">
            <i class="fas fa-download fa-sm text-white-50"> </i> Generate Report
        </a>   
    </div> 

    <?php    
    $res = mysqli_query($db,"SELECT * FROM maintenancerequest ");
    $row=mysqli_fetch_array($res); 

    $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee  AND Request_Status != 'PENDING'  ");
    ?> 
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered printTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>  
                            <th >Ticket Number </th>
                            <th >User Name </th>
                            <th >Woreda </th>
                            <th >Services </th>
                            <th >Computer Type </th> 
                            <th >Request Description </th>
                            <th >Request Status </th>
                            <th >Assigned To </th>
                            <th >Requested Date </th> 
                            <th >Options </th>  
                        </tr>
                    </thead> 
                    <tbody> 
                        <tr>
                        <?php 
                        while ($row = mysqli_fetch_array($data)) {  
                            $position=10; // Define how many character you want to display.

                            $message= $row["Request_Description"]; 
                            $post = substr($message, 0, $position); 

                            $readDate= $row["Requested_Date"]; 
                            $Date = substr($readDate, 0, $position); 

                            ?>    
                            <td><?php echo $row["Ticket_Number"]; ?> </td>
                            <td><?php echo $row["User_Namee"]; ?> </td>
                            <td><?php echo $row["Woreda"]; ?> </td>
                            <td><?php echo $row["Services"]; ?> </td>
                            <td><?php echo $row["Computer_Type"]; ?> </td> 
                            <td><?php echo $post; ?> </td>
                            <td><?php echo $row["Request_Status"]; ?> </td> 
                            
                            <td><?php echo $row['Assigned_To']  ?> </td> 
                            <td><?php echo $Date; ?> </td>  
                                    
                            <td>
                                <a class=" btn btn-warning btn-circle" style="margin-left: 15px; margin-right: 25px;" href='EditRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>'> 
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a class=" btn btn-danger btn-circle" style="margin-left: 15px; margin-right: 25px;" href='DeleteRequest.php?ticketnumber=<?php echo $row["Ticket_Number"]?>'>
                                    <i class="fas fa-trash"></i>
                                </a>  
                            </td>
                        </tr>   
                            <?php   
                        }  ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<!-- /.container-fluid -->

<?php 
    include('footer.php');    
?>
