<?php       
    include("security.php");  
    include("sidemenu.php"); 
    include("top.php"); 
?>

        <div class="container-fluid" style="margin-top:50px; margin-bottom:30px; " >   
            <div class="x_panel" style="text-align:center;" >
                <div class="x_title"> 
                    <h3 class="text-center">Maintained Requests</h3>
                </div>  

                <div class="x_content" >
                    <form name="form1" action="" method="post" >
                        <input  id="tohidetoassign" type="text" name="ticketnumber" placeholder="Enter Ticket Number" required>
                        <input  id="tohidetoassign" type="submit" name="submit1" class="btn btn-primary" value="search Request" style="margin-left:10px;"> 
                    </form>

                    <?php
                    $TotalResult = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Request_Status = 'MAINTAINED' ");

                    if (isset($_POST['submit1'])) {
                            
                        $result= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'");
                    
                        $resultCheck = mysqli_num_rows($result);
                        $row5 = mysqli_fetch_array($result); 
                            
                        $result1= mysqli_query($db, "SELECT Ticket_Number FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]' AND Request_Status = 'MAINTAINED' ");

                        $resultCheck1 = mysqli_num_rows($result1);
                        $row1 = mysqli_fetch_array($result1);  

                        if( $resultCheck == 0 ){  
                            echo "Wrong Ticket Number <br><br>";
                            $res = mysqli_query($db,"SELECT * FROM maintenancerequest"); 
                        }  

                        elseif( $resultCheck1 == 0 ){
                                
                            echo "Request Not Maintained <br><br>";
                            echo "<a href='MaintainedRequest.php'>Go BAck</a>";
                        }

                        else{
                            $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Ticket_Number = '$_POST[ticketnumber]' ");
                            
                            echo '<div class="table-responsive">';
                            echo "<form>";
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>"; 
                                        echo "<th>"; echo"User Image "; echo"</th>";
                                        echo "<th>"; echo"ID "; echo"</th>";
                                        echo "<th>"; echo"Ticket Number"; echo"</th>";
                                        echo "<th>"; echo"User Name"; echo"</th>";
                                        echo "<th>"; echo"Woreda"; echo"</th>";
                                        echo "<th>"; echo"Request Description"; echo"</th>";
                                        echo "<th>"; echo"Request Status"; echo"</th>";
                                        echo "<th>"; echo"Assigned To"; echo"</th>";
                                        echo "<th>"; echo"Requested Date"; echo"</th>"; 
                                        echo "<th>"; echo"Maintained"; echo"</th>"; 
                                    echo "</tr>";

                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>"; ?> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> <?php   echo"</td>";
                                        echo "<td>"; echo $row["ID"]; echo"</td>";
                                        echo "<td>"; echo $row["Ticket_Number"]; echo"</td>";
                                        echo "<td>"; echo $row["User_Namee"]; echo"</td>";
                                        echo "<td>"; echo $row["Woreda"];  echo"</td>";
                                        echo "<td>"; echo $row["Request_Description"]; echo"</td>";
                                        echo "<td>"; echo $row["Request_Status"]; echo"</td>";
                                        echo "<td>"; echo $row["Assigned_To"]; echo"</td>";  
                                        echo "<td>"; echo $row["Requested_Date"]; echo"</td>"; 
                                        echo "<td>"; echo $row["Maintained_Date"]; echo"</td>";  
                                    }  
                                    echo "</tr>";
                                echo"</table>";  
                            echo"</form>"; 
                        } 
                    }   
                            
                    else{ 
                        $res = mysqli_query($db,"SELECT * FROM maintenancerequest WHERE Assigned_To = '$_SESSION[username]' AND Request_Status = 'MAINTAINED' ORDER BY Maintained_Date ASC; ");
                        
                        $count = mysqli_num_rows($res); 
                            if(   $count !== 0){ 
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
                                        echo "<tr>";  
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
                        }
                        else{
                            echo "<div class='m-3'>You Haven't Maintained a Request Yet. </div>";
                        }
                    } 
                    ?>
                    
                </div>
                </div>
            </div> 
        </div>      

<?php
echo '<div style=" right: 0; bottom: 0; left: 0; z-index: 1030;" >';
    include('footer.php');  
echo '</div>';

 //ID,Ticket_Number,First_Name,Middle_Name,Last_Name,Woreda,User_Description,User_Name,Status,Date
                                
/*
    elseif (isset($_POST['submitedit1ww'])) {
        echo $row['Ticket_Number'];
        
        $qty=0;
        $res = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number='$row[Ticket_Number]' ");
        
        while($row2=mysqli_fetch_array($res)){
            $qty=$row2["Assigned_To"];
        } 

        if( mysqli_query($db, "UPDATE maintenancerequest SET Assigned_To = '$assignto' WHERE Ticket_Number='$_POST[ticketnumber]' ")){

            echo ' Request Is Assigned To  ' .$assignto;
            mysqli_query($db, "UPDATE maintenancerequest SET Request_Status = 'ACCEPTED' WHERE Ticket_Number='$_POST[ticketnumber]' ");



            $res3 = mysqli_query($db,"SELECT * FROM maintenancerequest");

            echo "<table class='table table-bordered'>";
                echo "<tr>";
                    echo "<th>"; echo"ID "; echo"</th>";

                    echo "<th>"; echo"User Image "; echo"</th>";

                    echo "<th>"; echo"Ticket Number"; echo"</th>";
                    echo "<th>"; echo"User Name"; echo"</th>";
                    echo "<th>"; echo"Woreda"; echo"</th>";
                    echo "<th>"; echo"Services"; echo"</th>";
                    echo "<th>"; echo"Computer Type"; echo"</th>"; 
                    echo "<th>"; echo"Request Description"; echo"</th>";
                    echo "<th>"; echo"Request Status"; echo"</th>";
                    echo "<th>"; echo"Assigned To"; echo"</th>";
                    echo "<th>"; echo"Requested Date"; echo"</th>"; 
                    echo "<th>"; echo"Delete Request"; echo"</th>";
                echo "</tr>";

                while($row3=mysqli_fetch_array($res3)){
                    echo "<tr>"; 
                        echo "<td>"; echo $row3["ID"]; echo"</td>";

                        echo "<td>"; ?> <img src="<?php echo $row["user_image"]; ?>" height= "100" width="100"> <?php   echo"</td>";
                        
                        echo "<td>"; echo $row3["Ticket_Number"]; echo"</td>";
                        echo "<td>"; echo $row3["User_Namee"]; echo"</td>";
                        echo "<td>"; echo $row3["Woreda"];  echo"</td>";
                        echo "<td>"; echo $row3["Services"];  echo"</td>";
                        echo "<td>"; echo $row3["Computer_Type"];  echo"</td>";
                        echo "<td>"; echo $row3["Request_Description"]; echo"</td>";
                        echo "<td>"; echo $row3["Request_Status"]; echo"</td>";
                        echo "<td>"; echo $row3["Assigned_To"]; echo"</td>";
                        echo "<td>"; echo $row3["Requested_Date"]; echo"</td>"; 
                        echo "<td>"; ?><a href="delete_request.php?id=<?php echo $row3["id"]?>">Delete Request</a><?php echo"</td>";
                    echo "</tr>";
                }
            echo"</table>";

        }
        else{
            echo("Error description1: " . mysqli_error($db));  

        }
    } 
*/
 

/*
    elseif($res2 = mysqli_query($db, "SELECT * FROM maintenancerequest WHERE Ticket_Number ='$_POST[ticketnumber]'")){
        $row2 = mysqli_fetch_array($res2);

        $username = $row2["User_Namee"]; 
        $woreda = $row2["Woreda"]; 
        $ticketnumber = $row2["Ticket_Number"];  
        ?>
        <form class="form-inline" name="form3" action="" method="post" >
            <table class='table table-bordered' >
                <tbody>
                    <tr>                            
                        <th>ID  </th>
                        <th>User Image  </th>
                        <th>Ticket Number </th>
                        <th>User Name </th>
                        <th>Woreda </th>
                        <th>Request Description </th>
                        <th>Request Status </th>
                        <th>Assigned To </th>
                        <th>Requested Date </th>  
                        <th>Change  </th> 
                    </tr> 

                    <tr>
                        <td><input type="text" value="<?php echo $row2['ID'] ?>"class="form-control" name="username" placeholder="User Name" disabled/></td>
                        <td><img src="<?php echo $row["user_image"]; ?>" height= "75" width="75"></td>
                        <td><input type="text" value="<?php echo $row2['Ticket_Number']; ?>" class="form-control" name="ticketnumber"  placeholder="Ticket Number" disabled/></td>
                        <td><input type="text" value="<?php echo $row2['User_Namee'] ?>"class="form-control" name="username" placeholder="User Name" disabled/></td>
                        <td><input type="text" value="<?php echo $row2['Woreda'] ?>" class="form-control" name="woreda" placeholder="Woreda" disabled/></td>
                        <td><input value="<?php echo $row2["Request_Description"]?>"  name='requestdescription' disabled> </td>
                        <td>  
                            <select name="requeststatus" class="form-control selectpicker">
                                <option  name='requeststatus' selected><?php echo $row2['Request_Status']?></option>
                                <?php
                                $res3 = mysqli_query($db, "SELECT enum FROM  maintenancerequest WHERE Request_Status ") ;
                                
                                $res4 = mysqli_query($db, "SELECT enum FROM  maintenancerequest WHERE Request_Status ") ;
                                    
                                $result = mysqli_query($db, "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
                                        WHERE TABLE_NAME = 'maintenancerequest' AND COLUMN_NAME = 'Request_Status'") or die (mysqli_error($db));
                                
                                $row11 = mysqli_fetch_array($result);
                                $enumList = explode(",", str_replace("'", "", substr($row11['COLUMN_TYPE'], 5, (strlen($row11['COLUMN_TYPE'])-6))));
                                
                                $value ; 
                                foreach($enumList as $value) 
                                    
                                    echo "<option name='requeststatus'> $value </option>";
                                ?> 
                            </select> 
                        </td>
                        <td>   
                            <select name="assignto" class="form-control selectpicker">
                                <option  name='assignto' selected><?php echo $row2['Assigned_To']?></option>
                                <?php
                                $res = mysqli_query($db, "SELECT User_Namee FROM user WHERE User_Type= 'IT EMPLOYEE' ");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option name='assignto'>".  $row['User_Namee']. "</option>";
                                }
                                ?> 
                            </select>  
                        </td> 
                        <td><input type="text" value="<?php echo $row2["Requested_Date"] ?>" class="form-control" name="woreda" placeholder="Woreda" disabled/>  
                        </td> 
                        <td>
                            <a class="fas fa-trash-alt btn btn-danger"  href="DeleteRequest.php?id=<?php echo $row["ID"];?>"> Disapprove </a> 
                            <input type="submit" name="saveeditedrequest" class="form-control btn btn-primary" value="SAVE"  />
                        </td>
                    </tr>   
                <tbody>
            </table>  
        </form>
        <?php
    }
*/ 
?>