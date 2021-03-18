<?php   
    include("security.php");      
    
    include("sidemenu.php");  

?> 
 
 <style>
    option{
        min-width: 32px;
        width: 32px; 
        height: 24px;
        line-height: 24px;
        font-size: 12px;
        border-radius: 4px;
        border: 1px solid transparent;
    }
</style>
 
<!-- /.col (left) -->
<div class="col-md-8 m-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Date picker</h3>
        </div>

        <div class="card-body"> 
            
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
            <form action="" method="post" name="formrange" id="report"> 
                <div class="form-group">  
                    <label>Date range button:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
                        </div>
                        <select name="chance" class="dropdown" onchange="formrange.submit()">  
                            <option value=""  selected disabled><?php if(isset($_POST['chance'])){echo $_POST['chance'];}else{echo 'Select Date';}?> </option>
                            <option name="today" value="today"> Today</option>
                            <option name="yesterday" value="yesterday" > Yesterday</option>
                            <option name="last 7 Days" value="last 7 Days"> Last 7 Days</option>
                            <option name="this Month" value="this Month" > This Month</option>
                            <option name="last 30 Day" value="last 30 Day"> Last 30 Day</option>
                            <option name="last Month" value="last Month" > Last Month</option> 
                            <option name="last 3 Month" value="last 3 Month" > Last 3 Month</option>
                            <option name="last 6 Month" value="last 6 Month" > Last 6 Month</option> 
                            <option name="last Year" value="last Year" > Last Year</option> 
                        </select> 
                    </div>
                    <!-- /.input group -->
                </div> 
            </form>
            <!-- /.form group -->

        </div> 
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

<?php 
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
        
    }
  
    if(isset($_POST['chance'])) { 
        
        if ($_POST['chance'] == "today") {
            echo "today <br> ";

            $today = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date = CURDATE() ");
            $todayn = mysqli_num_rows ($today);
            echo $todayn.'<br><br>'; 

            if($todayn < 1){
                echo "NO Request Based On This Interval ";

            }else{
            ?> 
            <table class='table table-bordered'> Today's
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
                    while($rowme3 = mysqli_fetch_assoc ($today) ){ 
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
            <?php }
        }
        elseif ($_POST['chance'] == "yesterday") {
            echo "yesterday";
            
            $yesterday = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE() ");
            $yesterdayn = mysqli_num_rows ($yesterday);
            echo $yesterdayn.'<br><br>'; 
            
            if($yesterdayn < 1){
                echo "NO Request Based On This Interval ";

            }else{
 
            ?> 
            <table class='table table-bordered'>  Yesterday's
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
                    while($rowme3 = mysqli_fetch_assoc($yesterday) ){ 
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
            }
        }
        elseif ($_POST['chance'] == "last 7 Days") {
            echo "last 7 Days";

            $days7 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() ");
            $days7n = mysqli_num_rows ($days7);
            echo $days7n.'<br><br>';
            
            if($days7n < 1){
                echo "NO Request Based On This Interval ";

            }else{ 

            ?> 
            <table class='table table-bordered'>  7 Days
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
                    while($rowme3 = mysqli_fetch_assoc ($days7) ){ 
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
            }
        }
        elseif ($_POST['chance'] == "this Month") {
            echo "this Month ";
 
            $thisM = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW()) ");
            $thisMn = mysqli_num_rows ($thisM);
            echo $thisMn.'<br><br>'; 
            
            if($thisMn < 1){
                echo "NO Request Based On This Interval ";

            }else{
            
            ?> 
            <table class='table table-bordered'>  This Month's
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
                    while($rowme3 = mysqli_fetch_assoc ($thisM) ){ 
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
            }
        }
        elseif ($_POST['chance'] == "last 30 Day") {
            echo "last 30 Day";
            
            $last30D = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() ");
            $last30Dn = mysqli_num_rows ($last30D);
            echo $last30Dn.'<br><br>';  
            
            if($last30Dn < 1){
                echo "NO Request Based On This Interval ";

            }else{
 
            ?> 
            <table class='table table-bordered'>  last 30 Days
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
                    while($rowme3 = mysqli_fetch_assoc ($last30D) ){ 
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
            }
        }
        elseif ($_POST['chance'] == "last Month") {
            echo "last Month ";

            $lastM = mysqli_query($db, " SELECT * FROM maintenancerequest WHERE Requested_Date  >= DATE_FORMAT( CURRENT_DATE - INTERVAL 1 MONTH, '%Y/%m/01' )  
                    AND Requested_Date < DATE_FORMAT( CURRENT_DATE, '%Y/%m/01' )");
            $lastMn = mysqli_num_rows ($lastM);
            echo $lastMn.'<br><br>'; 
            
            if($lastMn < 1){
                echo "NO Request Based On This Interval ";

            }else{
 
            ?> 
            <table class='table table-bordered'>  last Month
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
                    while($rowme3 = mysqli_fetch_assoc ($lastM) ){ 
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
                    }   
                    ?>
                </tbody>
            </table> 
            <?php   
            }
        }
        elseif ($_POST['chance'] == "last 3 Month") {
            echo "last 3 Month";
            
            $last3M = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 3 MONTH AND CURDATE() ");
            $last3Mn = mysqli_num_rows ($last3M);
            echo $last3Mn.'<br><br>'; 
            
            if($last3Mn < 1){
                echo "NO Request Based On This Interval ";

            }else{
            
            ?> 
            <table class='table table-bordered'>  last 3 Month
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
                    while($rowme3 = mysqli_fetch_assoc ($last3M) ){ 
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
                    }   
                    ?>
                </tbody>
            </table> 
            <?php   
            }
        }
        elseif ($_POST['chance'] == "last 6 Month") {
            echo "last 6 Month";
            
            $last6M = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 6 MONTH  AND CURDATE() ");
            $last6Mn = mysqli_num_rows ($last6M);
            echo $last6Mn.'<br><br>'; 
            
            if($last6Mn < 1){
                echo "NO Request Based On This Interval ";

            }else{

            ?> 
            <table class='table table-bordered'>  last 6 Month
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
                    while($rowme3 = mysqli_fetch_assoc ($last6M) ){ 
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
            }
        }
        elseif ($_POST['chance'] == "last Year") {
            echo "last Year";
       
            $lastYear = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE  Requested_Date  BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE() ");
            $lastYearn = mysqli_num_rows ($lastYear);
            echo $lastYearn.'<br><br>'; 
            
            if($lastYearn < 1){
                echo "NO Request Based On This Interval ";

            }else{
             
            ?>

            <table class='table table-bordered'>  last Year
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
                    while($rowme3 = mysqli_fetch_assoc ($lastYear) ){ 
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
            <?php }
        }
    }    
  

    /*
        echo $_POST['today'] ;
        echo $_POST['yesterday'] ;
        echo $_POST['last 7 Days'] ;
        echo $_POST['this Month'] ;
        echo $_POST['last 30 Day'] ;
        echo $_POST['last Month'] ;
        
        today      
        yesterday   
        last 7 Days
        this Month   
        last 30 Day
        last Month 
    */
?>


</div>

 

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
        document.getElementById("myForm").submit();
        //document.getElementByID("reportform").submit();
    }
</script>

 
<button type="button" name= "go" class="btn btn-default float-right" id="daterange-btn">
                        
                        <i class="far fa-calendar-alt"></i> Date range picker
                        <i class="fas fa-caret-down"></i>
                       
                </button>
            <div id='reportrange'> <span name="reportoption" ></span> </div>  
<style>
    .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}
.daterangepicker { 
    display: block;
    top: 263px;
    left: 305px; 
    right: auto;
}
.daterangepicker .ranges select {
    list-style: none;
    margin: 0 auto;
    padding: 0;
    width: 100%;
}
.daterangepicker {
    position: absolute;
    color: inherit;
    background-color: #fff;
    border-radius: 4px;
    border: 1px solid #ddd; 
    max-width: none;
    padding: 0;
    margin-top: 7px;
    top: 100px;
    left: 20px;
    z-index: 3001;
    display: none;
    font-family: arial;
    font-size: 15px;
    line-height: 1em;
}
.ranges option {
    font-size: 12px;
    padding: 8px 12px;
    cursor: pointer;
}
.ranges option:focus {
    background-color: #08c;
    color: #fff;
}
.ranges option:hover {
    background-color: #eee;
}
@media (min-width: 564px){
.daterangepicker .ranges select {
    width: 140px;
}

.daterangepicker .ranges select {
    list-style: none;
    margin: 0 auto;
    padding: 0;
    width: 100%;
}}
</style>
<?php

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
 ?>