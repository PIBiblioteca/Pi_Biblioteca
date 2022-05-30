<?php
session_start();
if(!isset($_SESSION["usuario"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "connection.php"


?>
