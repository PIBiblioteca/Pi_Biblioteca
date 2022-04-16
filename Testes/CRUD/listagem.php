<?php

include 'conexao.php';

$buscar_cadastros = "SELECT * FROM recados"; //tabela de teste
$query_cadastros = mysqli_query($conexao, $buscar_cadastros);

?>

<!doctype html>
<html lang="en">

<head>
    <title>CADASTRO DE USUÁRIO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- -->
        <?php //PROGRAMAÇÃO DO FILTRO
    $parametro = filter_input(INPUT_GET, "parametro");
    $mysqllink = mysqli_connect("localhost", "root", "");
    mysqli_select_db("recados");

    if($parametro) {
        $dados = mysqli_query("SELECT * FROM recado WHERE recado LIKE '$parametro%' ORDER BY recado");
    } else {
        $dados = mysqli_query("SELECT * FROM recado ORDER BY recado");
    }

    $linha = mysqli_fetch_assoc($dados);
    $total = mysql_num_rows($dados);
    ?> 
</head>

<body>

    <div class="container">
        <h1>Tabela de teste CRUD</h1>
        <p> <!-- FILTRO -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="parametro"/>
                <input type="submit" value="Buscar">
            </form>
        </p>
        <table class="table">
            <thead>
                <!-- cabeçalho da tabela -->
                <tr>
                    <!-- linha -->
                    <th>Id</th> <!-- coluna -->
                    <th>Recado</th> <!-- coluna -->
                </tr>
            </thead>
            <tbody> 
                <!-- while q puxa os dados do BD -->
                <?php 
                while ($receber_cadastros = mysqli_fetch_array($query_cadastros)) {
                    $id_recado = $receber_cadastros['id_recado'];
                    $recado = $receber_cadastros['recado'];

                ?>
                    <tr>

                        <td scope="row"> <?php echo $id_recado; ?> </td> <!-- Coluna id -->
                        <td> <?php echo $recado; ?> </td> <!-- Coluna recado -->
                        
                        <td>
                            <!-- Coluna com Função editar -->
                            <form action="editar.php" method="post"> <!-- Conexão -->
                                <input type="hidden" name="id_recado" value="<?php echo $id_recado; ?>">
                                <input type="text" name="recado" value="<?php echo $recado; ?>">
                                <input type="submit" value="editar">
                            </form>
                        </td> <!-- Fim da função editar -->

                        <td>
                            <!-- Coluna com Função excluir -->
                            <form action="excluir.php" method="post"> <!-- Conexão -->
                                <input type="hidden" name="id_recado" value="<?php echo $id_recado; ?>">
                                <input type="submit" value="excluir">
                            </form>
                        </td> <!-- Fim da função excluir -->

                    </tr>

                <?php }; ?>
                <!-- fim do while -->

                <tr> <!-- Linha com Função cadastrar -->
                    <form action="cadastro.php" method="post">
                        <td></td>
                        <td> <input type="text" name="recado"> </td>
                        <td> <input type="submit" value="cadastrar"> </td>
                    </form>
                </tr> <!-- Fim da função cadastrar -->

            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>