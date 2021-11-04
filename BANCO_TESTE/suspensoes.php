<!DOCTYPE html>
<?php 

include("config.php");

$consulta = "SELECT * FROM suspensoes";
$conn = $conexao->query($consulta) or die($conexao->error);
?> 
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
      
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/menu.css">

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
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/retiradas.php">Retiradas</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/devolucoes.php">Devoluções</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/index.php">Livros</a></li>
          <li><a class="destaque" href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/suspensoes.php">Suspensões</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/recados.php">Recados</a></li>
          <li class="sair"><a href="/html/t0_index.html">Sair</a></li>
        </ul>
      </nav>
  </header>
        
          <tr>
            <a href="cadastro.php" target="_blank"><td><button class="button-Adicionar"><i class="fas fa-plus"></i> Adicionar recado </button> </td></a>
          </tr>
  
  
  
  <!--BUSCAR-->
        <th> <div class="buscar">
        <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
        <a class="buscar-btn">
            <i class="fas fa-search"></i>
        </a>
        </div> </th> 
        <!--FIM BUSCAR-->

        <table class="table">
            <thead>
                <td>ID</td>
                <td>Usuário</td>
                <td>inicio</td>
                <td>Fim</td>
                <td>Motivo</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
            </thead>
            <tbody>
            <?php 
            
            if ($conn->num_rows > 0){
              while ($dado = $conn->fetch_assoc()){?>
                <tr class="dados">
                  <td> <?php echo $dado['id_suspensao']; ?> </td>
                  <td> <?php echo $dado['id_usuario']; ?> </td>
                  <td> <?php echo $dado['inicio']; ?> </td>
                  <td> <?php echo $dado['fim']; ?> </td>
                  <td> <?php echo $dado['motivo']; ?> </td>
                  <td> <a href="index.php?codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></a></td>
                  <td> <a href="index.php?p=deletar&codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></a></td>
            <?php } } ?> 
            <tbody>
        </table>
  </body>
</html>