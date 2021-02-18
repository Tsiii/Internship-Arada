<?php   
   
   include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="x_title"> 
        <h3>Users Information</h3> 
    </div>

    <?php $res = mysqli_query($db, "SELECT * FROM user ORDER BY ID ASC"); ?>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>          
                            <th>ID </th> 
                            <th>User Image </th>
                            <th>Full Name</th>                                                    
                            <th>User Name</th>
                            <th>Phone</th>    
                            <th>Woreda</th>
                            <th>User Type</th>                                                   
                            <th>User Status</th>
                            <th>Registered Date </th>
                            <th>Approve </th>
                            <th>Disapprove </th>
                        </tr> 
                    <thead>
                    <tbody>
                        <tr> 
                        <?php  
                        while ($row=mysqli_fetch_array($res)) {
                            ?>
                            <td> <?php echo $row["ID"]; ?> </td> 
                            <td> <img src="<?php echo $row["User_Image"]; ?>" height= "100" width="100"> </td> 
                            <td> <?php echo $row["First_Name"].' '.$row["Middle_Name"];?>  </td>
                            <td> <?php echo $row["User_Namee"];?> </td>
                            <td> <?php echo $row["Phone"];?>  </td>
                            <td> <?php echo $row["Woreda"];?>  </td>
                            <td> <?php echo $row["User_Type"];?>  </td>
                            <td> <?php echo $row["User_Status"];?>  </td>
                            <td> <?php echo $row["Registered_Date"];?>  </td>
                            <td> 	
                                <a href="./includes/approve.php?id=<?php echo $row["ID"];?>" class="btn btn-success btn-circle">
                                    <i class="fas fa-check"></i>
                                </a></td>
                            <td> 
                                <a href="./includes/disapprove.php?id=<?php echo $row["ID"];?>" class="btn btn-danger btn-circle">
                                    <i class="fas fa-times"></i>
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

<?php
    include('footer.php');
?>