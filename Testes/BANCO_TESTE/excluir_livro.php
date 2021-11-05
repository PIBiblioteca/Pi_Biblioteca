<?php
include_once 'config.php';

$livro_codigo = intval($_GET['codigo']);

$sql_code = "DELETE FROM livros WHERE cod_livro = '$livro_codigo'";
$sql_query = $mysqli -> query($sql_code) or die($mysql -> error);
    
    if (mysqli_query($conexao, $sql)) {
    echo "<script> location.href='index.php;'  </script>";
} else {
    echo "
    <script> alert('Não foi possível deletar o livro.'); 
    location.href='index.php';
    </script>";
}
mysqli_close($conexao);
?>