<?php

include_once("conexao.php");

$curso = $_POST['curso'];
$titulo = $_POST['titulo'];
$quantidade = $_POST['quantidade'];

$sql = "insert into livros (curso, titulo, quantidade) values ('$curso', '$titulo', '$quantidade')";
$salvar = mysqli_query($conexao, $sql);

mysqli_close($conexao);

?>