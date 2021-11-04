<!DOCTYPE html>
<?php 

include("config.php");

$consulta = "SELECT * FROM devolucoes";
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
    <title>BiblioFateca - Devoluções</title>

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
          <li><a class="destaque" href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/devolucoes.php">Devoluções</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/livros.php">Livros</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/suspensoes.php">Suspensões</a></li>
          <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/recados.php">Recados</a></li>
          <li class="sair"><a href="/html/t0_index.html">Sair</a></li>
        </ul>
      </nav>
  </header>
    <script src="/Oficial/menubiblio.js"></script>      
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

        <table class="tabela" border="1">
            <tr class="cabecalho">
                <td>ID</td>
                <td>Usuário</td>
                <td>livro</td>
                <td>Saída</td>
                <td>Retorno</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
            <?php 
            
            if ($conn->num_rows > 0){

                while ($dado = $conn->fetch_assoc()){    ?>          
            
                    <tr class="dados">
                      <td> <?php echo $dado['id_devolucao']; ?> </td>
                      <td> <?php echo $dado['id_usuario']; ?> </td>
                      <td> <?php echo $dado['nome_livro']; ?> </td>
                      <td> <?php echo $dado['saida']; ?> </td>
                      <td> <?php echo $dado['retorno']; ?> </td>
                      <td> <a href="index.php?codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></a></td>
                      
                      <td> <a href="index.php?p=deletar&codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></a></td>
                      </tr>
                    <?php } } ?> 
      
        </table>

</body>
</html>
