<?php  

    $resme2 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Requested_Date >= DATE_FORMAT( CURRENT_DATE - 
            INTERVAL 1 MONTH, '%Y/%m/%d' ) AND Requested_Date < DATE_FORMAT( CURRENT_DATE, '%Y/%m/%d' )"); 

    //$rowme2 = mysqli_fetch_assoc($resme2);
    $rowme2 = mysqli_num_rows ($resme2);
    echo $rowme2;

?>
   
<input type="month" name="" id="" placeholder="month">
<input type="week" name="" id=""  placeholder="week">
<input type="date" name="" id=""  placeholder="date">
<input type="datetime" name="" id=""  placeholder="datetime">
 
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