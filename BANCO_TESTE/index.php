<!DOCTYPE html>
<?php 

include("/XAMPP/htdocs/VSCODE/GitHub/PiBiblioteca/BANCO_TESTE/config.php");

$consulta = "SELECT * FROM livros";
$con = $mysqli->query($consulta) or die($mysqli->error);
?> 
<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
        <table border="1">
            <tr>
                <td>Curso</td>
                <td>Código Livro</td>
                <td>Titulo</td>
                <td>Quantidade</td>
            </tr>
            <?php while($dado = $con-> fetch_array()){ ?>
            <tr>
                <td><? echo $dado["curso"]; ?></td>
                <td><? echo $dado["cod_livro"]; ?></td>
                <td><? echo $dado["titulo"]; ?></td>
                <td><? echo $dado["quantidade"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>