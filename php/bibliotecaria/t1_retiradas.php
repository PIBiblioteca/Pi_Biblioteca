<!DOCTYPE html>

<?php 

include("config.php");

$consulta = "SELECT * FROM retiradas";
$conn = $conexao->query($consulta) or die($conexao->error);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="../../css/estilo_padrão.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="shortcut icon" href="/img/favicon_bibliofateca.png" type="image/x-icon">
    <title>Bibliofateca - Retiradas</title>
</head>

<!-- Menu Estrutura -->
<body>
    <header id="header">
        <!-- <a class="logo" id="logo" href="#"> FATEC <alt="Logo Fatec"> </a> -->
        
        <img src="/img/logo_bibliofateca.png" alt="Logo Fatec" class = logo_bibliofateca>

        <nav id="nav">
          <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
          </button>
          <ul id="menu" role="menu">
            <li><a class="destaque" href="/php/bibliotecaria/t1_retiradas.html">Retiradas</a></li>
            <li><a href="/php/bibliotecaria/t2_devolucoes.html">Devoluções</a></li>
            <li><a href="http://localhost:8080/GitHub/Pi_Biblioteca/BANCO_TESTE/">Livros</a></li>
            <li><a href="/php/bibliotecaria/t4_suspensoes.html">Suspensões</a></li>
            <li><a href="/php/bibliotecaria/t5_recados.html">Recados</a></li>
            <li><a href="/html/t0_index.html" class="sair">Sair</a></li>
          </ul>
        </nav>
      </header>
      <script src="/Oficial/menubiblio.js"></script>
<!-- FIM Menu Estrutura-->

<!-- BUSCAR -->
    <th> 
        <div class="buscar"> 
            <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
            <a class="buscar-btn">
                <i class="fas fa-search"></i>
            </a>
        </div> 
    </th> 
<!-- FIM BUSCAR -->


        <table class="tabela">
                <tr class="cabecalho">
                    <th>Id</th>
                    <th class="esquerda">Livro</th>
                    <th>RA/MP</th>
                    <th>E-mail</th>
                    <th>Saída</th>
                    <th>Devolução</th>
                    <th class="maior5">Livro retirado?</th>
                </tr>
            
            <?php 
            if ($conn->num_rows > 0){

                while ($dado = $conn->fetch_assoc()){    ?>          
                    <tr class="dados">
                     <td> <?php echo $dado['id_solicitacao']; ?> </td>
                     <td> <?php echo $dado['nome_livro']; ?> </td>
                     <td> <?php echo $dado['id_usuario']; ?> </td>
                     <td> <?php echo $dado['email']; ?> </td>
                     <td> <?php echo $dado['saida']; ?> </td>
                     <td> <?php echo $dado['devolucao']; ?> </td>
                    <td> <a href="index.php?codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></a></td>
                    
                     <td> <a href="index.php?p=deletar&codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></a></td>
                     </tr>
                    <?php } } ?>
        </table>
</body>
</html>