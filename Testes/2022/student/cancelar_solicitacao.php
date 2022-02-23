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

//id da solicitação
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $res7 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE id='$id'");
    while ($row7 = mysqli_fetch_array($res7)) {
        $booksname = $row7["books_name"];
    }   
    mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$booksname'"); //função aumentar quantidade disponível
    
    
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