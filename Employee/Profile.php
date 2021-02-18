<?php   

    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>

    <style>
        input,
        input:focus{  
            background-color: white, white;
            background-color: -internal-light-dark(rgb(255, 255, 255), rgb(255, 255, 255));
            width: 105px; 
            max-width: 150px; 
        }
    </style>

<!-- Begin Page Content -->
<div class="container-fluid"> 
    <?php
        $res = mysqli_query($db, "SELECT * FROM user  WHERE User_Namee = '$_SESSION[username]'");
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0  " style="text-align: center;">User Information | Profile</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>           
                            <th>User Image </th>
                            <th>First Name</th>
                            <th>Middle Name </th>
                            <th>Last Name</th>                                                    
                            <th>User Name</th>
                            <th>Phone</th>    
                            <th>Woreda</th>
                            <th>User Type</th>                                                   
                            <th>User Status</th>
                            <th>Registered Date </th> 
                        </tr> 
                    <thead>
                    <tbody>
                        <tr style="text-transform: capitalize;"> 
                        <?php 

                        while ($row=mysqli_fetch_array($res)) {
                            ?>   
                            <td> <img src="<?php echo $row["User_Image"]; ?>" height= "75px" width="75px"> </td> 
                            <td  style="text-transform: capitalize;"> <input  style="text-transform: capitalize;" type="text" name="firstname" value="<?php echo $row["First_Name"]; ?>" 
                                style="border-color: none;" width="48" height="48"></td>
                            <td> <input type="text" name="middlename" value="<?php echo $row["Middle_Name"];?> "
                                onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';"></td>
                            <td> <input type="text" name="lastname" value="<?php echo $row["Last_Name"];?>"></td>
                            <td> <?php echo $row["User_Namee"];?> </td>
                            <td> <input type="text" name="phone" value="<?php echo $row["Phone"];?>  "></td>
                            <td> <input type="text" name="woreda" value="<?php echo $row["Woreda"];?> "> </td>
                            <td> <?php echo $row["User_Type"];?>  </td>
                            <td> <?php echo $row["User_Status"];?>  </td>
                            <td> <?php echo date("Y-m-d ", strtotime($row['Registered_Date'])); ?>  </td> 

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
 