<?php   
    include("security.php");      
    
    include("sidemenu.php");  

?> 

















<!-- /.col (left) -->
<div class="col-md-8 m-5">
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
            <form action="" method="post">
                <div class="form-group">
                    <label>Date range:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control float-right " id="reservation" name="first" value='<?php if(isset($_POST['first'])) echo $_POST['first']; ?>'> 
                        <button type="submit" name="showdaterange" class="input-group-text btn btn-primary">Show</button> 
                    </div>
                    <!-- /.input group -->
                </div>
            </form>
            <!-- /.form group -->

            <!-- Date and time range -->
            <form action="" method="post">
                <div class="form-group">
                    <label>Date and time range:</label> 
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control float-right" name="firstall" id="reservationtime" value='<?php if(isset($_POST['firstall'])) echo $_POST['firstall']; ?>'>
                        <button type="submit" name="showdaterangeall" class="input-group-text btn btn-primary">Show</button> 
                    </div>
                    <!-- /.input group -->
                </div>
            </form>
            <!-- /.form group -->

            <!-- Date and time range -->
            <form action="" method="post" name="formrange" id="report" >
                <div class="form-group">
                    <label>Date range button:</label>
                    <select><i class="far fa-calendar-alt"></i> Date range picker
                        <option data-range-key="Today">Today</option>
                        <option data-range-key="Yesterday" class="active">Yesterday</option>
                        <option data-range-key="Last 7 Days">Last 7 Days</option>
                        <option data-range-key="This Month">This Month</option>
                        <option data-range-key="Last 30 Day" class="">Last 30 Day</option>
                        <option data-range-key="Last Month">Last Month</option> 
                    </select>

                    <div class="input-group">
                    <button type="button" name= "go" class="btn btn-default float-right"id="daterange-btn">
                        
                            <i class="far fa-calendar-alt"></i> Date range picker
                            <i class="fas fa-caret-down"></i>
                           
                    </button>
                    <button type="submit" id="reportoption" name="ss" class="input-group-text btn btn-primary"> </button> 

                    </div>
                </div>
                <div id='reportrange'> <span name="reportoption" ></span> </div>
                <p id="demo"></p>
            </form>
            <!-- /.form group -->

        </div> 
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?php
    //SELECT * FROM maintenancerequest WHERE Requested_Date BETWEEN 2020-12-01 AND 2021-03-30
    
    if(isset($_POST['showdaterange'])) {   

        $startingdate = substr("$_POST[first]",0,10) ;
        $endingdate = substr("$_POST[first]",13);
    
        $startoriginalDate = "$startingdate";
        $startDate = date("Y-m-d  ", strtotime($startoriginalDate));

        $endoriginalDate = "$endingdate";
        $endDate = date("Y-m-d  ", strtotime($endoriginalDate));

        echo $startDate; echo ' - ';  echo $endDate;
        
        echo '<br><br>Fetch Last Date Record <br>'; 
        $records = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date BETWEEN '$startDate' AND  '$endDate' ");  
        $rowme33a = mysqli_num_rows ($records);    
        
        echo $rowme33a.'<br>';
    /*
        while($rowme33b = mysqli_fetch_assoc ($records) ){ 
            echo '<input type="text" name="ticketnumber1" value="'.$rowme33b["Ticket_Number"].'" class="form-control"  /> ';
        }*/
    }

    if(isset($_POST['showdaterangeall'])) {   
        
        $startingdate = substr("$_POST[firstall]",0,19) ;
        $endingdate = substr("$_POST[firstall]",22);
    
        $startoriginalDate = "$startingdate";
        $startDate = date("Y-m-d h:i:s  ", strtotime($startoriginalDate));

        $endoriginalDate = "$endingdate";
        $endDate = date("Y-m-d h:i:s ", strtotime($endoriginalDate));

        echo $startDate; echo ' - ';  echo $endDate;
        
        echo '<br><br>Fetch Last Date Record <br>'; 
        $recordas = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date BETWEEN $startDate AND  $endDate ");  
        $rowme33a = mysqli_num_rows ($recordas);
        echo $rowme33a.'<br>';
    
        while($rowme33b = mysqli_fetch_assoc ($records) ){ 
            echo '<input type="text" name="ticketnumber1" value="'.$rowme33b["Ticket_Number"].'" class="form-control"  /> ';
        }
    }
    
 
    if(isset($_POST['formdaterange'])) {   
        echo 'rangeoptionsubmitted';
        echo $_POST['reportoption'];
        ?>
        <script>
            alert('Hello');
        </script>
        <?php
    }
 
    if(isset($_POST['myForm'])) {   
        echo 'rangeoptionsubmitted';
        echo $_POST['reportoption'];
        ?>
        <script>
            alert('Hello');
        </script>
        <?php
    }


?>













<div class="m-5"> 
<?php  

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


<?php

    /*

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




        <form name="frmSearch" method="post" action="">
            <p class="search_input">From Date
                <input type="date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
        To Date<input type="text" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
                <input type="submit" name="go" value="Search" >
            </p>
        </form>



    */
?>
































































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
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
        //document.getElementById('formdaterange').submit();
        //document.forms["formdaterange"].submit();
        //$('#report span').submit();
  

      }
    ) 
  })    
</script>




<script>
    function myFunction() {
        document.getElementById("demo").innerHTML = 6;
        document.getElementById("myForm").submit();
        //document.getElementByID("reportform").submit();
    }
</script>

 