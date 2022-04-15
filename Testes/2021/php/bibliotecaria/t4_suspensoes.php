<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="../../css/estilo_padrão.css">
  <link rel="stylesheet" href="../../css/menu.css">
  <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">
  <title>BiblioFateca - Suspensões</title>
</head>

<!-- Menu Estrutura -->

<body>
  <header id="header">
    <img src="/GitHub/Pi_Biblioteca/img/logo_bibliofateca.png" alt="Logo Fatec" class=logo_bibliofateca>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t1_retiradas.php">Retiradas</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t2_devolucoes.php">Devoluções</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t3_livros.php">Livros</a></li>
        <li><a class="destaque" href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t4_suspensoes.php">Suspensões</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t5_recados.php">Recados</a></li>
        <li><a href="/GitHub/Pi_Biblioteca/php/t0_index.html" class="sair">Sair</a></li>
      </ul>
    </nav>
  </header>
  <script src="/Oficial/menubiblio.js"></script>
  <!-- FIM Menu Estrutura-->

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
      <th>ID</th>
      <th>RA/MP</th>
      <th>Início</th>
      <th>Fim</th>
      <th class="maior3 esquerda">Motivo</th>
      <td>Excluir</td>
    </tr>

    <tr>
      <td>1</td>
      <td>1234567890SP</td>
      <td>20/03/2021</td>
      <td>20/04/2021</td>
      <td>Atrasou 5 dias</td>
      <td><button class="button-Excluir"> <i class="fas fa-times"></i></button></td>
    </tr>
    <tr>
      <td>2</td>
      <td>1234567890SP</td>
      <td>20/03/2021</td>
      <td>*REPOSIÇÃO</td>
      <td>Perdeu/Avariou o livro</td>
      <td><button class="button-Excluir"> <i class="fas fa-times"></i></button></td>
    </tr>
    <tr>
      <td>3</td>
      <td>1234567890SP</td>
      <td>25/03/2021</td>
      <td>25/04/2021</td>
      <td>Atrasou 7 dias</td>
      <td><button class="button-Excluir"> <i class="fas fa-times"></i></button></td>
    </tr>
  </table>

</body>

</html>