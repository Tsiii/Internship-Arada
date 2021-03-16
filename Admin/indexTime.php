<?php   
    include("security.php");      
    
    include("sidemenu.php");  

?> 
<div class="m-5"> 
<?php 
/*
    $resme = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE YEAR(Requested_Date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
            AND MONTH(Requested_Date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH");
            
    $rowme = mysqli_fetch_assoc($resme);
    $rowme = mysqli_num_rows ($resme);
    echo $rowme.'yyy'; */


    $resme2 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date >= DATE_FORMAT( CURRENT_DATE - 
            INTERVAL 1 MONTH, '%Y/%m/%d' ) AND Requested_Date < DATE_FORMAT( CURRENT_DATE, '%Y/%m/%d' )"); 

    //$rowme2 = mysqli_fetch_assoc($resme2);
    $rowme2 = mysqli_num_rows ($resme2);
    echo $rowme2;

?>
    
    <table class='table table-bordered'> 
        <thead>  
            <tr>                  
                <th> Ticket Number </th> 
                <th> Woreda </th>
                <th> Services </th>
                <th> Computer Type </th>  
                <th> Assigned_To </th> 
                <th> Request Status </th> 
                <th> Requested Date </th>  
            </tr>
        </thead>
        <tbody>
            <?php  
            while ($rowme2 = mysqli_fetch_assoc($resme2)) {
                $position=16; // Define how many character you want to display.
                $readDate= $rowme2["Services"];
                $Services = substr($readDate, 0, $position);
                
                $position=10; // Define how many character you want to display.
                $readDate= $rowme2["Requested_Date"];
                $Date = substr($readDate, 0, $position); 
                
                ?>
                <tr>   
                    <td> <?php echo $rowme2["Ticket_Number"]; ?>  </td>  
                    <td> <?php echo $rowme2["Woreda"]; ?>  </td> 
                    <td> <?php echo $Services; ?>  </td> 
                    <td> <?php echo $rowme2["Computer_Type"]; ?>  </td>  
                    <td> <?php echo $rowme2["Assigned_To"]; ?>  </td>   
                    <td> <?php echo $rowme2["Request_Status"]; ?>  </td>                                                   
                    <td> <?php echo $Date; ?>  </td>
                    
                </tr>
                <?php 
            }   ?>
        </tbody>
    </table>

<input type="month" name="" id="" placeholder="month">
<input type="week" name="" id=""  placeholder="week">
<input type="date" name="" id=""  placeholder="date">
<input type="datetime" name="" id=""  placeholder="datetime">

<?php

    $resme3 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date BETWEEN '2021-02-12' AND '2021-10-12'");
    $rowme3 = mysqli_num_rows ($resme3);
    echo $rowme3;
    ?>
    <table class='table table-bordered'> Specific
        <thead>  
            <tr>                  
                <th> Ticket Number </th> 
                <th> Woreda </th>
                <th> Services </th>
                <th> Computer Type </th>  
                <th> Assigned_To </th> 
                <th> Request Status </th> 
                <th> Requested Date </th>  
            </tr>
        </thead>
        <tbody>
            <?php 
            
            while ($rowme3 = mysqli_fetch_assoc($resme3)) {
                $position=16; // Define how many character you want to display.
                $readDate= $rowme3["Services"];
                $Services = substr($readDate, 0, $position);
                
                $position=10; // Define how many character you want to display.
                $readDate= $rowme3["Requested_Date"];
                $Date = substr($readDate, 0, $position); 
                
                ?>
                <tr>   
                    <td> <?php echo $rowme3["Ticket_Number"]; ?>  </td>  
                    <td> <?php echo $rowme3["Woreda"]; ?>  </td> 
                    <td> <?php echo $Services; ?>  </td> 
                    <td> <?php echo $rowme3["Computer_Type"]; ?>  </td>  
                    <td> <?php echo $rowme3["Assigned_To"]; ?>  </td>   
                    <td> <?php echo $rowme3["Request_Status"]; ?>  </td>                                                   
                    <td> <?php echo $Date; ?>  </td>
                    
                </tr>
                <?php 
            }   ?>
        </tbody>
    </table>

<?php

 
echo ' <input type="text" name="" class="datetimepicker" id="">';

echo '<br>Fetch Last Date Record <br>';
$record = mysqli_query($db, "SELECT *
FROM maintenancerequest
WHERE DATE(Requested_Date) = DATE(NOW()) ORDER BY `id` DESC"); 
$rowme33 = mysqli_num_rows ($record);
echo $rowme33.'<br>';


echo '<br>Fetch Last WEEK Record<br>';
$record = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE 
    YEARWEEK(`Requested_Date`, 1) = YEARWEEK( CURDATE() - INTERVAL 1 WEEK, 1)"); 
$rowme44 = mysqli_num_rows ($record);
echo $rowme44.'<br><br>';


echo ' Get Last 7 Day Record<br>';
$record = mysqli_query($db, "SELECT *
FROM maintenancerequest
WHERE Requested_Date >= DATE(NOW()) - INTERVAL 7 DAY"); 
$rowme55 = mysqli_num_rows ($record);
echo $rowme55.'<br> ';
echo ' =====================OR=================================<br>';
 
$record = mysqli_query($db, "SELECT *
FROM maintenancerequest
WHERE Requested_Date >= DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) 
ORDER BY Requested_Date DESC"); 
$rowme66 = mysqli_num_rows ($record);
echo $rowme66.'<br><br>';


echo 'Fetch Last Month Record<br>';
$record = mysqli_query($db, "SELECT * FROM maintenancerequest
WHERE YEAR(Requested_Date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(Requested_Date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)"); 
$rowme77 = mysqli_num_rows ($record);
echo $rowme77.'<br><br>';


echo 'Get Last 3 Month Record<br>';
$record = mysqli_query($db, "SELECT * 
FROM maintenancerequest
WHERE Requested_Date > DATE_SUB(CURDATE(), INTERVAL 3 MONTH)"); 
$rowme4 = mysqli_num_rows ($record);
echo $rowme4.'<br>';
echo ' =====================OR=================================<br>';
 
$record = mysqli_query($db, "SELECT *
FROM maintenancerequest
WHERE Requested_Date >= DATE(NOW()) - INTERVAL 3 MONTH"); 
$rowme5 = mysqli_num_rows ($record);
echo $rowme5.'<br><br>';


echo ' Fetch Last Year Record<br>';
$record = mysqli_query($db, "SELECT *
FROM maintenancerequest
WHERE YEAR(Requested_Date) = YEAR(NOW() - INTERVAL 1 YEAR) ORDER BY `id` DESC"); 
$rowme6 = mysqli_num_rows ($record);
echo $rowme6.'<br><br>';


echo ' Year Wise Data<br>';
$record = mysqli_query($db, "SELECT * FROM maintenancerequest GROUP BY YEAR(Requested_Date)"); 
$rowme7 = mysqli_num_rows ($record);
echo $rowme7.'<br>';


?>

<div class="container">
   <div class='col-md-5'>
      <div class="form-group">
         <div class='input-group date' id='datetimepicker6'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
      </div>
   </div>
   <div class='col-md-5'>
      <div class="form-group">
         <div class='input-group date' id='datetimepicker7'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(function () {
       $('#datetimepicker6').datetimepicker();
       $('#datetimepicker7').datetimepicker({
   useCurrent: false //Important! See issue #1075
   });
       $("#datetimepicker6").on("dp.change", function (e) {
           $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
       });
       $("#datetimepicker7").on("dp.change", function (e) {
           $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
       });
   });
</script>



<?php

	$post_at = "";
	$post_at_to_date = "";
if(isset($_POST['go'])){ 
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE post_at BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from posts " . $queryCondition . " ORDER BY post_at desc";
	$result = mysqli_query($db,$sql);
}

?>
<form name="frmSearch" method="post" action="">
	 <p class="search_input">From Date
		<input type="date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
 To Date<input type="text" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
</form>






<!-- /.col (left) -->
<div class="col-md-6">
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Date picker</h3>
    </div>
    <div class="card-body">
    <!-- Date -->
    <div class="form-group">
        <label>Date:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>
    <!-- /.form group -->
    <!-- Date range -->
    <div class="form-group">
        <label>Date range:</label>

        <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="far fa-calendar-alt"></i>
            </span>
        </div>
        <input type="text" class="form-control float-right" id="reservation">
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <!-- Date and time range -->
    <div class="form-group">
        <label>Date and time range:</label>

        <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-clock"></i></span>
        </div>
        <input type="text" class="form-control float-right" id="reservationtime">
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->

    <!-- Date and time range -->
    <div class="form-group">
        <label>Date range button:</label>

        <div class="input-group">
        <button type="button" class="btn btn-default float-right" id="daterange-btn">
            <i class="far fa-calendar-alt"></i> Date range picker
            <i class="fas fa-caret-down"></i>
        </button>
        </div>
    </div>
    <!-- /.form group -->
    </div>
    <div class="card-footer">
        Visit <a href="https://tempusdominus.github.io/bootstrap-4/Usage/">tempusdominus </a> for more examples and information about
        the plugin.
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->






























































<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script> 
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script> 
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script> 
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
  $(function () { 
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    ) 
  })    
</script>