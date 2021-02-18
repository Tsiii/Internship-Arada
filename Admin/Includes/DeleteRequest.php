<?php
    include("../../includes/server.php");  
    $ticketnumber =$_GET["ticketnumber"];

    mysqli_query($db, "DELETE FROM maintenancerequest WHERE Ticket_Number=$ticketnumber");

?>

<script type="text/javascript">
    window.location="../DisplayRequest.php"; 
</script>