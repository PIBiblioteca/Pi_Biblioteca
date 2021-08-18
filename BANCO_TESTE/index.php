<!DOCTYPE html>
<?php 

include("config.php");

$consulta = "SELECT * FROM livros";
$conn = $mysqli->query($consulta) or die($mysqli->error);
?> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="/GitHub/Pi_Biblioteca/css/style_bibliotecaria.css">
    <link rel="shortcut icon" href="/imagem/favicon_bibliofateca.png" type="image/x-icon">
    <title>BiblioFateca - Livros</title>
</head>
<body>
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
        
        <!--BUSCAR-->
        <th> <div class="buscar">
        <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
        <a class="buscar-btn">
            <i class="fas fa-search"></i>
        </a>
        </div> </th> 
        <!--FIM BUSCAR-->

        <table border="1">
            <tr class="cabecalho">
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
            <tr>
                <td><button class="button-Adicionar"><i class="fas fa-plus"></i> Adicionar livro </button> </td>
            </tr>
        </table>
       
        <!--
        <footer>
            <a> <img src="/imagem/logo_fatec.png" alt="Logotipo Fatec Franco da Rocha" class="logo-fatec"></a>
            <a>Email: biblioteca@fatec.sp.gov.br</a>  
            <a>Telefone: (xx) x xxxx - xxxx</a>
        </footer>
        -->
</body>
</html> 