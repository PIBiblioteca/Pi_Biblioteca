<!DOCTYPE html>
<?php 

include("config.php");

$consulta = "SELECT * FROM livros";
$conn = $mysqli->query($consulta) or die($mysqli->error);
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
            <?php 
            
            if ($conn->num_rows > 0){

                while ( $dado = $conn->fetch_assoc()){            
            
                    echo '<tr>';
                    echo '<td>'. $dado['curso'] .'</td>';
                    echo '<td>'. $dado['cod_livro'] .'</td>';
                    echo '<td>'. $dado['titulo'] .'</td>';
                    echo '<td>'. $dado['quantidade'] .'</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </body>
</html>



if ($resulta->num_rows > 0){

while($dado = $conn->fetch_array()){ ?>
<tr>
    <td><? echo $dado["curso"]; ?></td>
    <td><? echo $dado["cod_livro"]; ?></td>
    <td><? echo $dado["titulo"]; ?></td>
    <td><? echo $dado["quantidade"]; ?></td>
</tr>
}           
}
<?  