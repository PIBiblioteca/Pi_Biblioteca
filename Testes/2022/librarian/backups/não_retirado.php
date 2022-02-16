<?php
include "connection.php";

//puxa identificação da solicitação
$id = $_GET["id"];

//puxa dados da tabela retiradas
$res = mysqli_query($link, "UPDATE solicitacoes SET status_solicitacao='LIVRO NÃO RETIRADO NO PRAZO' WHERE id='$id'");

$res5=mysqli_query($link, "SELECT * FROM solicitacoes WHERE id='$id'");
while($row5=mysqli_fetch_array($res5)){
    $booksname=$row5["books_name"];
}

mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$booksname'"); //função aumentar quantidade disponível

?>
    <script type="text/javascript">
        alert("SOLICITAÇÃO CANCELADA");
        window.location="retiradas.php";
    </script>
