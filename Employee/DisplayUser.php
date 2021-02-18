<?php   
   
   include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Information</h1>
    
    <!-- DataTales Example -->
    <?php 
        $res = mysqli_query($db, "SELECT * FROM user WHERE User_Namee='$_SESSION[username]'");
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "> </h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>  
                            <th> User Image </th> 
                            <th> First Name </th> 
                            <th> Middle Name </th> 
                            <th> Last Name </th> 
                            <th> User Name </th> 
                            <th> Phone </th> 
                            <th> Woreda </th> 
                            <th> Department </th> 
                            <th> Registered date </th> 
                        </tr> 
                    <thead>
                    <tbody>
                        <tr> 
                        <?php 
                        while ($row=mysqli_fetch_array($res)) {
                            ?> 
                            <td hidden><?php echo $row["ID"];?> </td> 
                            <td> <img src="<?php echo $row["User_Image"]; ?>" height= "100" width="100"> </td> 
                            <td> <?php echo $row["First_Name"]; ?></td> 
                            <td> <?php echo $row["Middle_Name"]; ?></td> 
                            <td> <?php echo $row["Last_Name"]; ?></td> 
                            <td> <?php echo $row["User_Namee"]; ?></td> 
                            <td> <?php echo $row["Phone"]; ?></td> 
                            <td> <?php echo $row["Woreda"]; ?></td> 
                            <td> <?php echo $row["Department"]; ?></td> 
                            <td> <?php echo $row["Registered_Date"]; ?></td> 
                        </tr> 
                        <?php 
                        }
                        ?> 
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