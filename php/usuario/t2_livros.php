<!DOCTYPE html>
<?php 

include("../config.php");

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

    <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">
    <title>BiblioFateca - Livros</title>
</head>

<!-- Menu Estrutura -->
<body>
    <header id="header_usuario">     
        
        <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
        <a class="buscar-btn" href="/GitHub/Pi_Biblioteca/php/usuario/t1_home.html">
            <i class="fas fa-arrow-left"></i>
        </a>

      <img src="/GitHub/Pi_Biblioteca/img/logo_bibliofateca.png" alt="Logo Fatec" class = logo_bibliofateca_usuario>    
    </header>
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

        <table class="tabela">
            <tr class="cabecalho">
                
                <td>Categoria</td>
                <td class="maior4">Título</td>
                <td>Autor</td>
                <td>Quantidade</td>
                <td>Editora</td>
                <td>Edição</td>
                <td></td>
            </tr>
                     
            <?php 
            
            if ($conn->num_rows > 0){

                while ($dado = $conn->fetch_assoc()){    ?>          
            
                    <tr class="dados">
                     
                     <td> <?php echo $dado['categoria']; ?> </td>
                     <td> <?php echo $dado['titulo']; ?> </td>
                     <td> <?php echo $dado['autor']; ?> </td>
                     <td> <?php echo $dado['quantidade']; ?> </td>
                     <td> <?php echo $dado['editora']; ?> </td>
                     <td> <?php echo $dado['edicao']; ?> </td>
                     <td>  <button class="button1">Solicitar Empréstimo </button> </td>
                    
                 <?php } } ?> 
      
        </table>

        
<footer class="footer_usuario">
  <img src="/GitHub/Pi_Biblioteca/img/logo_fatec.png" alt="Logo Fatec" class = logo_fatec>    
</footer>

</body>
</html>
