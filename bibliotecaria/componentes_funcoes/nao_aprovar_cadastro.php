<?php
include "../librarian/componentes_funcoes/connection.php";
$id=$_GET["id"];
mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='INATIVO' WHERE id='$id'");
?>

<script type="text/javascript">
    window.location="cadastros.php";
</script>