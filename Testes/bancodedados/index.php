<?php 

include("/bancodedados/conexao.php");

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
                <td>Código</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Data de Cadastro</td>
            </tr>
            <?php while($dado = $con->fetch_arrray)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </body>
</html>