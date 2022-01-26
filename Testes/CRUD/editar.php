<?php

include 'conexao.php'; //abrir conexão

$id_recado = $_POST['id_recado']; //receber dados (função "POST" recebe)
$recado = $_POST['recado']; //receber dados (função "POST" recebe)

$recebendo_cadastros = "UPDATE recados SET 
recado = '$recado' 
WHERE id_recado = '$id_recado'"; //editar recado com valores recebidos

$query_cadastros = mysqli_query($conexao, $recebendo_cadastros) or die(mysqli_error($conexao)); //validação da conexão

header('location: listagem.php'); //redirecionamento para página "listagem"


?>