<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>
<style>
    .list-group-item,
    .list-group-item a:hover{  
        text-decoration: none;
    }
</style>

<div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
    <div  style="text-align:center; ">
        <div class="x_panel"  style="text-align:center;" >
            <div class="x_title"> 
                <h2>Display Requests</h2>
            </div> 
        </div> 

        <div class="x_content"> 
            <div class="container">
                <div class="table-responsive"> 
                    
            <?php   
            $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE  Assigned_To = '$_SESSION[username]' ORDER BY  Requested_Date ASC; ");

            echo "<table class='table table-bordered'>";
                echo "<tr>";  
                    echo "<th>"; echo"User Name"; echo"</th>"; 
                    echo "<th>"; echo"Ticket Number"; echo"</th>";
                    echo "<th>"; echo"Services"; echo"</th>";
                    echo "<th>"; echo"Computer Type"; echo"</th>"; 
                    echo "<th>"; echo"Request Description"; echo"</th>";
                    echo "<th>"; echo"Request Status"; echo"</th>";
                    echo "<th>"; echo"Assigned To"; echo"</th>";
                    echo "<th>"; echo"Requested Date"; echo"</th>";  
                echo "</tr>";

                while($row=mysqli_fetch_array($res)){ 

                        echo "<td>"; echo $row["User_Namee"]; echo"</td>"; 
                        echo "<td>"; echo $row["Ticket_Number"]; echo"</td>";
                        echo "<td>"; echo $row["Services"];  echo"</td>";
                        echo "<td>"; echo $row["Computer_Type"];  echo"</td>";
                        echo "<td>"; echo $row["Request_Description"]; echo"</td>";
                        echo "<td>"; echo $row["Request_Status"]; echo"</td>";
                        echo "<td>"; echo $row["Assigned_To"]; echo"</td>";
                        echo "<td>"; echo $row["Requested_Date"]; echo"</td>";    
                                                                    
                        
                    echo "</tr>";
                }
            echo"</table>";  
    ?></div></div>
        </div>
    </div>
</div>  
 

<?php 
    include('footer.php');   
?>