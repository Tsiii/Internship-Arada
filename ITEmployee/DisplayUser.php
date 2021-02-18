<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
        <div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
            <div  style="text-align:center; ">
                <div class="x_panel"  style="text-align:center;" >
                    <div class="x_title"> 
                        <h3>My Information</h3> 
                    </div>
                </div>

                <form>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>  
                                            <?php 
                                            $res = mysqli_query($db, "SELECT * FROM user WHERE User_Namee = '$_SESSION[username]' ");?> 
                                            <th> User Image </th>
                                            <th> User Name </th>  
                                            <th> First Name </th>
                                            <th> Middle Name </th>
                                            <th> Last Name </th>
                                            <th> Phone </th>
                                            <th> Woreda </th>   
                                        </tr> 
                                    </thead>
                                    <tbody> 
                                        <tr> 
                                            <?php
                                            while ($row=mysqli_fetch_array($res)) { ?>
                                                <td> <img src="<?php echo $row["User_Image"]; ?>" height= "100" width="100"> </td> 
                                                <td> <?php echo $row["User_Namee"]; ?> </td>                                
                                                <td> <?php echo $row["First_Name"]; ?> </td>
                                                <td> <?php echo $row["Middle_Name"]; ?> </td>
                                                <td> <?php echo $row["Last_Name"]; ?> </td>
                                                <td> <?php echo $row["Phone"]; ?> </td>
                                                <td> <?php echo $row["Woreda"]; ?> </td>  <?php
                                            }
                                            ?>   
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
<?php
    include('footer.php');
?>