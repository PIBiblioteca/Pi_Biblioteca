<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link rel="stylesheet" href="../css/cadastro.css">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="login-body">
    
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

    <div class="form__group field">
    <form class ="login-form" method="POST">

        <h1> Cadastrar Livro </h1><br>
    
        <select class="form__field" name="curso" placeholder="Curso">
            <option value="GTI">GTI</option>
            <option value="G3E">G3E</option>
            <option value="Cultura Geral">Cultura Geral</option>
        </select><br><br>
        <input type="text" autocomplete="off" class="form__field" name="titulo" placeholder="Titulo"><br><br>
        <input type="number" autocomplete="off" scroll-behavior="inherit" class="form__field" name="quantidade" placeholder="Quantidade"><br><br><br><br>
        <input type="submit" class="form_field" name="cadastrar" placeholder="Cadastrar">
        <br><br><br>
    </form>
    </div>
    
</body>
</html>