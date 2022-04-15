<?php

include "../librarian/componentes_funcoes/connection.php";
$res5 = mysqli_query($link, "SELECT * FROM regras_biblioteca");
while ($row5 = mysqli_fetch_array($res5)) {
    $prazo_aprovacao_cadastro = $row5["prazo_aprovacao_cadastro"];
    $prazo_retirada_livro = $row5["prazo_retirada_livro"];
    $prazo_devolucao_livro = $row5["prazo_devolucao_livro"];
    $prazo_suspensao_usuario = $row5["prazo_suspensao_usuario"];
}

?>

