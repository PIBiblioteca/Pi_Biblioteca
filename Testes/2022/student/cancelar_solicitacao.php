<?php
session_start();
if(!isset($_SESSION["librarian"])) //CORRIGIR
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "connection.php";

if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    mysqli_query($link,"DELETE FROM solicitacoes WHERE id='$id'");
    ?>
    <script type="text/javascript">
        window.location="meus_emprestimos.php";

    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        window.location="meus_emprestimos.php";

    </script>
    <?php
}