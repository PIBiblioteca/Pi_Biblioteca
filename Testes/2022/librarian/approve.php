<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($link, "UPDATE student_registration SET status='ATIVO' WHERE id=$id");
?>

<script type="text/javascript">
    window.location="cadastros.php";
</script>