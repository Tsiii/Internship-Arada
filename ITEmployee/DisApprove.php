<?php
    include("../includes/server.php");  
    $id = $_GET["id"];
    mysqli_query($db, "UPDATE user SET User_Status = 'REJECTED' WHERE id = $id  ");
?>

<script type="text/javascript">
    window.location = "DisplayUser.php";
</script>