<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste PHP</title>
    <style>
        h2{
            color: blue;
            text-shadow: 1px 1px 1px black;
        }

    </style>
</head>
<body>
    supertag (para adicionar outras linguagens) PHP: <?php ?>
    <H1>TESTE PHP</H1>
    <?php 
    echo "<h2>Ola, <br> Mundo</h2>";
    ?>
    <h2>Variáveis</h2>
    
    <?php
    $nome_da_variavel="valor da variável";
    echo $nome_da_variavel;
    ?>

    No PHP não precisa definir os tipos primitivos, a variável é versátil e identifica o tipo
    FORÇAR TIPO PRIMITIVO (typecast):
        (int)
        (real)
        (float)
        (string)
        tipo lógico não tem, são considerados inteiros: Verdaeiro = 1 Falso = '' (vazio)
        <br>
        <br>
    <?php
    $nome_da_variavel="valor da variável";
    echo $nome_da_variavel;
    
    $n = 4;
    $n = "Jean";
    $n = (int)"Jean";
    $n = (int)"5Jean";
    echo $n; 
    ?>
<?php

?>
<?php

?>

<br>
<br>
    CONCATENAR    
<br>

    <?php 
    $nome="Jean";
    $idade="29";
    echo $nome." tem ".$idade." anos!";
    echo "$nome tem $idade anos!";
    ?>
    necessário usar aspas duplas para uso das variáveis dentro da string
    se usar aspas simples não identifica variaveis:
        <br>
    <?php
    echo '$nome tem $idade anos!';
        ?>  

</body>
</html>