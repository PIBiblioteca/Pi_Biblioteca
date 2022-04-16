<!DOCTYPE html>
<?php 

include("/Users/Jean/OneDrive/Documentos/GitHub/Pi_Biblioteca/Testes/bancodedados/conexao.php");

$consulta = "SELECT * FROM usuario";
$con = $mysqli->query($consulta) or die($mysqli->error);
?> 
<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
        <table>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Data de Cadastro</td>
            </tr>
            <?php while($dado = $con->fetch_array()){ ?>
            <tr>
                <td><? echo $dado["uso_id"]; ?></td>
                <td><? echo $dado["uso_nome"]; ?></td>
                <td><? echo $dado["uso_email"]; ?></td>
                <td><? echo $dado["uso_datadecadastro"]; ?></td>
            </tr>
            <?php } ?>
        </table>

    </body>
</html>