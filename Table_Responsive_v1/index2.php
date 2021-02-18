<?php   
    include("../Admin/security.php");      
    
    include("../Admin/sidemenu.php"); 
    include("../Admin/top.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
    				<?php $res = mysqli_query($db, "SELECT * FROM user ORDER BY ID ASC"); ?>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1"> ID </th> 
								<th class="column2"> User Image</th>
								<th class="column3"> Full Name</th>
								<th class="column4"> User Name</th>
								<th class="column5"> Phone</th>
								<th class="column6"> Woreda</th>
								<th class="column7"> User Type </th>
								<th class="column8"> User Status</th>
								<th class="column9"> Registered </th>
								<th class="column10">Approve </th>
								<th class="column11">Disapprove </th>
							</tr> 
						</thead>
						<tbody>
							<tr class="mt-2">
								<?php  
								while ($row=mysqli_fetch_array($res)) {
									?> 
									<td class="column1 "> <?php echo $row["ID"]; ?></td>
									<td class="column2 "> <img  src="<?php echo $row["User_Image"]; ?>" height= "100" width="100"> </td>
									<td class="column3"> <?php echo $row["First_Name"].' '.$row["Middle_Name"].' '.$row["Last_Name"];?> </td>
									<td class="column4">  <?php echo $row["User_Namee"];?> </td>
									<td class="column5">  <?php echo $row["Phone"];?>  </td>    
									<td class="column6">  <?php echo $row["Woreda"];?>  </td>
									<td class="column7">  <?php echo $row["User_Type"];?> </td> 
									<td class="column8">  <?php echo $row["User_Status"];?> </td>
									<td class="column9">  <?php echo $row["Registered_Date"];?> </td> 
									<td class="column10">
										<a href="./includes/approve.php?id=<?php echo $row["ID"];?>" class="btn btn-success btn-circle">
											<i class="fas fa-check"></i>
										</a>
									</td><td class="column11">
										<a href="./includes/approve.php?id=<?php echo $row["ID"];?>" class="btn btn-success btn-circle">
											<i class="fas fa-check"></i>
										</a>
									</td>
								</tr>  
								<?php   
								}  ?>  
						</tbody>
					</table>
					
					<table>
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
								<td> <?php echo $row["First_Name"].' '.$row["Middle_Name"].' '.$row["Last_Name"];?>  </td>
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


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>