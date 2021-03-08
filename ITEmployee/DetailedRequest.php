<?php   
    include("security.php");      
    
    include("sidemenu.php"); 
    include("top.php"); 
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- table edit -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive"> 

                <?php  
                if($ticketnumber = $_GET["ticketnumber"]){  

                    $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$ticketnumber' ");
                    $row=mysqli_fetch_array($res) ;  

                    $data= mysqli_query($db,"SELECT * FROM  maintenancerequest, user WHERE maintenancerequest.User_Namee = user.User_Namee AND Ticket_Number = '$row[Ticket_Number]'  ");
                    $row2=mysqli_fetch_array($data) ; 
                    
                    ?>
                    <table class='table table-bordered' id="tohidetoassign"> 
                        <table class="table table-bordered">
                        <tr>
                            <td><input type="text" class="form-control" name="username"  placeholder=" <?php echo $_SESSION['username']; ?> " disabled/></td>
                        </tr>
                        <tbody>
                            <tr>                    
                                <form action='' method='POST'> 
                                    <tr>
                                        <td> Ticket_Number <input type="text" class="form-control" name="username"  value ='<?php echo $row["Ticket_Number"]; ?> ' disabled> </td>
                                    </tr> 
                                    <tr>
                                        <td>Woreda <input type="text" class="form-control" name="username"  value =' <?php echo $row["Woreda"]; ?>' disabled> </td>
                                        </tr>
                                    <tr>
                                        <td>Request_Description <input type="text" class="form-control" name="username"  value =' <?php echo $row["Request_Description"]; ?>' disabled> </td>
                                        </tr>
                                    <tr>
                                        <td>Request_Status <input type="text" class="form-control" name="username"  value =' <?php echo $row["Request_Status"]; ?>' disabled> </td>
                                    </tr>
                                    <tr>
                                        <td>Assigned To <input name="assignto" class="form-control selectpicker" value =' <?php echo $row["Assigned_To"]; ?>' disabled>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" name="username"  value ='<?php echo $row["Requested_Date"]; ?>' disabled> </td>  
                                    </tr> 
                                </form>
                            </tr> 
                        </tbody>
                    </table> 
                    <?php
                }   
                ?>   
            </div> 
        </div> 
    </div> 
</div>   

<?php
    include('footer.php');
?>