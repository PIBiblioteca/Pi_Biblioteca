<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "../librarian/componentes_funcoes/connection.php";

if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    mysqli_query($link,"DELETE FROM adicionar_livros WHERE id=$id");
    ?>
    <script type="text/javascript">
        window.location="livros.php";

    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        window.location="livros.php";

    </script>
    <?php
}