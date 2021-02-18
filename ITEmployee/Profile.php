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
            width: 80px; 
            max-width: 100px; 
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <tr> 
                            <?php 

                            while ($row=mysqli_fetch_array($res)) {
                                ?> 
                                <td> <img src="<?php echo $row["User_Image"]; ?>" height= "100" width="100px"> </td> 
                                <td hidden> <?php echo $row["First_Name"]; ?>
                                


                                <td> <input type="text" name="firstname" value="<?php echo $row["First_Name"]; ?>" onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';" style="border-color: none;" width="48" ></td>
                                <td> <input type="text" name="middlename" value="<?php echo $row["Middle_Name"];?> " onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';"></td>
                                <td> <input type="text" name="lastname" value="<?php echo $row["Last_Name"];?>" onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';"></td>
                                <td> <?php echo $row["User_Namee"];?> </td>
                                <td> <input type="text" name="phone" value="<?php echo $row["Phone"];?>  "></td>
                                <td> <input type="text" name="woreda" value="<?php echo $row["Woreda"];?> "> </td>
                                <td> <?php echo $row["User_Type"];?>  </td>
                                <td> <?php echo $row["User_Status"];?>  </td>
                                <td> <?php echo $row["Registered_Date"];?>  </td> 
                            </tr>   
                                    <?php   
                                }  ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> 


     <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Arada Subcity 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>  
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
      


</body> 
</html> 