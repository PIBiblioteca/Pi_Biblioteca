<!DOCTYPE html>
<?php 

include("config.php");

$consulta = "SELECT * FROM livros";
$conn = $mysqli->query($consulta) or die($mysqli->error);
?> 
<<<<<<< HEAD
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <link rel="stylesheet" href="/Testes/BANCO_TESTE/css/estilo_padrão.css">
    <link rel="stylesheet" href="/Testes/BANCO_TESTE/css/menu.css">

    <link rel="shortcut icon" href="/imagem/favicon_bibliofateca.png" type="image/x-icon">
    <title>BiblioFateca - Livros</title>
</head>
<body class="fundo">
    <header id="header">
        <a class="logo"id="logo" href="">FATEC</a>
        <nav id="nav">
          <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
          </button>
          <ul id="menu" role="menu">
            <li><a href="/html/bibliotecaria/t1_retiradas.html">Retiradas</a></li>
            <li><a href="/html/bibliotecaria/t2_devolucoes.html">Devoluções</a></li>
            <li><a class="destaque" href="/html/bibliotecaria/t3_livros.html">Livros</a></li>
            <li><a href="/html/bibliotecaria/t4_suspensoes.html">Suspensões</a></li>
            <li><a href="/html/bibliotecaria/t5_recados.html">Recados</a></li>
            <li class="sair"><a href="/html/bibliotecaria/t0_index.html">Sair</a></li>
          </ul>
        </nav>
      </header>
      <script src="/Oficial/menubiblio.js"></script>
            
=======
<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
        <table border="1">
>>>>>>> parent of 30f7e61 (Organização dos testes)
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
<<<<<<< HEAD
</body>
</html> 
=======
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
>>>>>>> parent of 30f7e61 (Organização dos testes)
