<?php   
   
   include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Maintained Requests </h1>
    
    <!-- DataTales Example -->
    <?php 
        $res = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE User_Namee='$_SESSION[username]' AND  Request_Status = 'MAINTAINED'");
        $row=mysqli_num_rows($res);

        if($row > 0){ 
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Results</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                    <thead>
                        <tr>   
                            <th> Ticket Number </th>   
                            <th> Woreda </th> 
                            <th> Request Description </th>                                          
                            <th> Request Status </th>
                            <th> Assigned To </th>
                            <th> Requested Date </th>  
                            <th> maintained_Date </th>  
                        </tr> 
                    <thead>
                    <tbody>
                        <tr> 
                        <?php 
                        while ($row=mysqli_fetch_array($res)) {
                            ?>  
                            <td> <?php echo $row["Ticket_Number"]; ?></td>    
                            <td> <?php echo $row["Woreda"]; ?></td> 
                            <td> <?php echo $row["Request_Description"]; ?> </td> 
                            <td> <?php echo $row["Request_Status"]; ?> </td> 
                            <td> <?php echo $row["Assigned_To"]; ?> </td> 
                            <td> <?php echo $row["Requested_Date"]; ?> </td>
                            <td> <?php echo $row["Maintained_Date"]; ?> </td>    
                        </tr> 
                        <?php 
                        }
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div><?php
    }
    else{ 
        ?>
        <div class="card shadow mb-4"> 
            <div class="card-body">
                <div class="text-center text-lg" style="margin-top: 20px;">
                    <P>Oops.... You Don't Have Maintained Request</P>
                </div>
            </div> 
        </div>
        <?php
    }?>
</div>
<!-- /.container-fluid -->

<?php
    include('footer.php');
?> 