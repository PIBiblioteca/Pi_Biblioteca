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
    <title>Bibliofateca - Retiradas</title>
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
                <li><a class="destaque" href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t1_retiradas.php">Retiradas</a></li>
                <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t2_devolucoes.php">Devoluções</a></li>
                <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t3_livros.php">Livros</a></li>
                <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t4_suspensoes.php">Suspensões</a></li>
                <li><a href="/GitHub/Pi_Biblioteca/php/bibliotecaria/t5_recados.php">Recados</a></li>
                <li><a href="/GitHub/Pi_Biblioteca/php/t0_index.html" class="sair">Sair</a></li>
            </ul>
        </nav>
    </header>
    <script src="/Oficial/menubiblio.js"></script>
    <!-- FIM Menu Estrutura-->


    <!-- IMPRIMIR LISTA -->
    <th>
    <td><button class="button-Adicionar"></i> Imprimir Lista de Assinaturas </button> </td>
    </th>
    <!-- FIM IMPRIMIR LISTA -->

    <!-- BUSCAR -->
    <th>
        <div class="buscar">
            <input type="text" name="" class="buscar-txt" placeholder="Buscar..." />
            <a class="buscar-btn">
                <i class="fas fa-search"></i>
            </a>
        </div>
    </th>
    <!-- FIM BUSCAR -->


    <table class="tabela">
        <tr class="cabecalho">
        <th>ID</th>
            <th class="esquerda">Livro</th>
            <th>RA/MP</th>
            <th>E-mail</th>
            <th>Saída</th>
            <th>Devolução</th>
            <th class="maior5">Livro retirado?</th>
        </tr>


        <tr>
            <td>1</td>
            <td>GARAMO - DIFICIL SUSTENTABILIDADE, A - POLITICA ENERGETICA E CONFLITOS AMBIENTAIS 1
                CMOD - LED: A LUZ DOS NOVOS PROJETOS 1 Ed 2012</td>
            <td>1234567890SP</td>
            <td>kevin@fatec.com</td>
            <th>10/12/2021</th>
            <th>25/12/2021</th>
            <th><button class="button1 button3">SIM</button> <button class="button2 button3">NÃO</button></th>
        </tr>
        <tr>
        <td>2</td>
            <td>SARAIV - ADMINISTRACAO DE RECURSOS HUMANOS - DO OPERACIONAL DO ESTRATEGICO 15 Ed 201</td>
            <td>1234567891SP</td>
            <td>jean@fatec.com</td>
            <th>10/12/2021</th>
            <th>25/12/2021</th>
            <th><button class="button1 button3">SIM</button> <button class="button2 button3">NÃO</button></th>
        </tr>
        <tr>
        <td>3</td>
            <td>CENGAG - ADMINISTRACAO ESTRATEGICA - TRADUCAO DA 10 EDICAO NORTE-AMERICANA 3 Ed 2015</td>
            <td>1234567892SP</td>
            <td>juan@fatec.com</td>
            <th>10/12/2021</th>
            <th>25/12/2021</th>
            <th><button class="button1 button3">SIM</button> <button class="button2 button3">NÃO</button></th>
        </tr>
        <tr>
        <td>4</td>
            <td>GARAMO - DIFICIL SUSTENTABILIDADE, A - POLITICA ENERGETICA E CONFLITOS AMBIENTAIS 1</td>
            <td>1124567893SP</td>
            <td>ronaldo@fatec.com</td>
            <th>10/12/2021</th>
            <th>25/12/2021</th>
            <th><button class="button1 button3">SIM</button> <button class="button2 button3">NÃO</button></th>
        </tr>
    </table>
</body>

</html>