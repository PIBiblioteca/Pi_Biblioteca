<!DOCTYPE html>
<?php

include("../conexao.php");

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

<body class="fundo">
  <header id="header">
    <img src="/GitHub/Pi_Biblioteca/img/logo_bibliofateca.png" alt="Logo Fatec" class=logo_bibliofateca>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t1_retiradas.php">Retiradas</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t2_devolucoes.php">Devoluções</a></li>
        <li><a class="destaque" href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t3_livros.php">Livros</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t4_suspensoes.php">Suspensões</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t5_recados.php">Recados</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/t0_index.html" class="sair">Sair</a></li>
      </ul>
    </nav>
  </header>
  <script src="/GitHub/Pi_Biblioteca/Oficial/menubiblio.js"></script>
  <!-- FIM Menu Estrutura-->

  <tr>
    <a href="cadastro.php" target="_blank">
      <td><button class="button-Adicionar"><i class="fas fa-plus"></i> Adicionar livro </button> </td>
    </a>
  </tr>
  <!--BUSCAR-->
  <th>
    <div class="buscar">
      <input type="text" name="" class="buscar-txt" placeholder="Buscar..." />
      <a class="buscar-btn">
        <i class="fas fa-search"></i>
      </a>
    </div>
  </th>
  <!--FIM BUSCAR-->

  <table class="tabela">
    <tr class="cabecalho">
      <td>ID</td>
      <td>Categoria</td>
      <td>ISBN</td>
      <td>Título</td>
      <td class="maior4">Autor</td>
      <td>Quantidade</td>
      <td>Editora</td>
      <td>Edição</td>
      <td>Editar</td>
      <td>Excluir</td>

    </tr>


    <?php

    if ($conn->num_rows > 0) {

      while ($dado = $conn->fetch_assoc()) {    ?>

        <tr class="dados">
          <td> <?php echo $dado['id']; ?> </td>
          <td> <?php echo $dado['categoria']; ?> </td>
          <td> <?php echo $dado['isbn']; ?> </td>
          <td> <?php echo $dado['titulo']; ?> </td>
          <td> <?php echo $dado['autor']; ?> </td>
          <td> <?php echo $dado['quantidade']; ?> </td>
          <td> <?php echo $dado['editora']; ?> </td>
          <td> <?php echo $dado['edicao']; ?> </td>


          <td> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></td>

          <td> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></td>
        </tr>
    <?php }
    } ?>

  </table>
</body>

</html>