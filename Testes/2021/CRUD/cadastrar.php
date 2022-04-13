<?php

include 'conexao.php'; //abrir conexão

$recado = $_POST['recado']; //receber dados (função "POST" recebe)

$recebendo_cadastros = "INSERT INTO
recados
VALUES ('', '$recado')"; //inserir na tabela "recados" os valores recebidos no parenteses

$query_cadastros = mysqli_query($conexao, $recebendo_cadastros); //validação da conexão

header('location: listagem.php'); //redirecionamento para página "listagem"


?>