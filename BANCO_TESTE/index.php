<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teste banco de dados</title>
</head>

<body>
    <?php
    if(isset($_POST["cadastro"])):

        $RA = $_POST["ra"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        $sql = $con->prepare("INSERT INTO alunos(ra, nome, email) VALUES('$ra', '$nome', '$email')");
        $sql -> execute();
        
        if($sql):
            echo"Cadastro realizado com sucesso";
        endif;
    endif;
    ?>

    <forms method="POST">
        <input type="text" name="" placeholder="ra">    
        <input type="text" name="nome" placeholder="nome">
        <input type="text" name="email" placeholder="email">
        <input type="submit" name="cadastrar" placeholder="cadastrar">
    </forms>
</body>

</html>