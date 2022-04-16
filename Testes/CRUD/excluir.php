<?php

include 'conexao.php'; //abrir conexão

$id_recado = $_POST['id_recado']; //receber dados (função "POST" recebe)

$recebendo_cadastros = "DELETE FROM recados WHERE id_recado = '$id_recado'";

$query_cadastros = mysqli_query($conexao, $recebendo_cadastros); //validação da conexão

header('location: listagem.php'); //redirecionamento para página "listagem"
 
?>