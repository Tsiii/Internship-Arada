<?php 
    session_start();
    unset($_SESSION["username"]);

    if(session_destroy() ){
        header("Location: login.php");
    } 
?>
<script type="text/javascript">
    window.location="login.php"; 
</script>
 