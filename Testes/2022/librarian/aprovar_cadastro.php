<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='ATIVO' WHERE id=$id");
?>

<script type="text/javascript">
    window.location="cadastros.php";
</script>