<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    include("config.php");

    if(isset($_POST["cadastrar"])):

        $curso = $_POST['curso'];
        $titulo = $_POST['titulo'];
        $quantidade = $_POST['quantidade'];

        $sql = "INSERT INTO livros(curso, cod_livro, titulo, quantidade) VALUES('$curso', NULL, '$titulo', '$quantidade' )";
        $salvar = mysqli_query($conexao, $sql);

        mysqli_close($conexao);

        if($sql):
            echo'Cadastro efetuado com sucesso! <br><br>';
        endif;
    endif;
    ?>

    <form method="POST">
        <input type="text" name="curso" placeholder="Curso">
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="text" name="quantidade" placeholder="Quantidade">
        <input type="submit" name="cadastrar" placeholder="Cadastrar">
    </form>
    
</body>
</html>