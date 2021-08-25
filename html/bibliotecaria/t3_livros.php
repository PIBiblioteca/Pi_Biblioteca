<!DOCTYPE html>
<?php 

include("../../BANCO_TESTE/config.php");

$consulta = "SELECT * FROM livros";
$conn = $conexao->query($consulta) or die($conexao->error);
?> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    
    <link rel="stylesheet" href="../../css/estilo_padrão.css">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/menu.css">

    <link rel="shortcut icon" href="/imagem/favicon_bibliofateca.png" type="image/x-icon">
    <title>BiblioFateca - Livros</title>
</head>

<!-- Menu Estrutura -->
<body class="fundo">
    <header id="header">
        <a class="logo"id="logo" href="">FATEC</a>
        <nav id="nav">
          <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
          </button>
          <ul id="menu" role="menu">
            <li><a href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t1_retiradas.html">Retiradas</a></li>
            <li><a href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t2_devolucoes.html">Devoluções</a></li>
            <li><a class="destaque" href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t3_livros.html">Livros</a></li>
            <li><a href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t4_suspensoes.html">Suspensões</a></li>
            <li><a href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t5_recados.html">Recados</a></li>
            <li class="sair"><a href="/GitHub/Pi_Biblioteca/html/bibliotecaria/t0_index.html">Sair</a></li>
          </ul>
        </nav>
      </header>
      <script src="/GitHub/Pi_Biblioteca/Oficial/menubiblio.js"></script>
<!-- FIM Menu Estrutura-->
            
            <tr>
            <a href="cadastro.php" target="_blank"><td><button class="button-Adicionar"><i class="fas fa-plus"></i> Adicionar livro </button> </td></a>
            </tr>
        <!--BUSCAR-->
        <th> <div class="buscar">
        <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
        <a class="buscar-btn">
            <i class="fas fa-search"></i>
        </a>
        </div> </th> 
        <!--FIM BUSCAR-->

        <br><table class="tabela" border="1">
            <tr class="cabecalho">
                <td>ID</td>
                <td>Categoria</td>
                <td>isbn</td>
                <td>Titulo</td>
                <td>Autor</td>
                <td>Quantidade</td>
                <td>Editora</td>
                <td>Edição</td>
                <td>Editar</td>
                <td>Excluir</td>
                
            </tr>
            
           
            <?php 
            
            if ($conn->num_rows > 0){

                while ($dado = $conn->fetch_assoc()){    ?>          
            
                    <tr class="dados">
                     <td> <?php echo $dado['id']; ?> </td>
                     <td> <?php echo $dado['categoria']; ?> </td>
                     <td> <?php echo $dado['isbn']; ?> </td>
                     <td> <?php echo $dado['titulo']; ?> </td>
                     <td> <?php echo $dado['autor']; ?> </td>
                     <td> <?php echo $dado['quantidade']; ?> </td>
                     <td> <?php echo $dado['editora']; ?> </td>
                     <td> <?php echo $dado['edicao']; ?> </td>

                    
                    <td> <a href="index.php?codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></a></td>
                    
                     <td> <a href="index.php?p=deletar&codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></a></td>
                     </tr>
                    <?php } } ?> 
      
        </table>
</body>
</html>
