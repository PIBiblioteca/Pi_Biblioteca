<?php
include "../librarian/componentes_funcoes/connection.php";
$id_usuario=$_GET["id_usuario"];
mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='ATIVO' WHERE id_usuario=$id_usuario");
?>

<script type="text/javascript">
    window.location="cadastros.php";
</script>