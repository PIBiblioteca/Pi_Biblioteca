<?php
include("config.php");



$sql = "DELETE FROM livros WHERE cod_livro='" . $dado["cod_livro"] . "'";
if (mysqli_connect($conexao, $sql)) {
    echo "Livro excluído com sucesso!";
} else {
    echo "Erro ao excluir o livro!: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>