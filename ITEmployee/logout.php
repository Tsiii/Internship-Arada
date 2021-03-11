<?php
session_start();
unset($_SESSION["itemployee"]);
unset($_SESSION["usertype"]);
?>
<script type="text/javascript">
    window.location="../login.php";

</script>