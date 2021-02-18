<?php  
    include("security.php");   

    include("sidemenu.php"); 
    include("top.php"); 
    $subcity = 'SubCity';
    echo $subcity;

    if(mysqli_query($db, "UPDATE user SET Woreda = '$subcity' WHERE Woreda = 0 ")){
        echo 'DONEEEE';
    }

?>