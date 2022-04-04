<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> BiblioFateca </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">
</head>

<!--FORÇAR ALTERAÇÃO NO ESTILO (tbm é possível alterar o arquivo "custom.css")
<style>
    .left_col {
    background: #b20000 !important;
}
.nav_title {
    
    background: #b20000;
    
}
/*
Anotações de alterações necessárias a serem feitas no Front: 
	- Alinhamento título página login
	- Melhorar pág livros
	- Home no logo
	- Melhorar ícones do menu
	- Mudar ícone de "editar perfil" e "editar regras" do usuário e bibliotecária
	- Corrigir responsividade, botão e texto nas tabelas de páginas editar livro e editar perfil
	- Organizar página editar perfil (usuário)
	- Remover barras de rolagem em telas com pouca informação
	- Modo noturno
Exibir um livro por linha no modo mobile
*/
</style>
-->

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>BiblioFateca</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- estilo para tabelas responsivas (barra de rolagem) -->
                <style>
                    div#container {
                        overflow-x: auto;
                    }
                </style>
                <!-- fim estilo para tabelas responsivas (barra de rolagem) -->
                
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img style="width: 60px" src="images/astronauta.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Olá,</span>

                        <h2><?php echo $_SESSION["librarian"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/1>
                

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                            <li><a href="cadastros.php"><i class="fa fa-home"></i> Cadastros <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="retiradas.php"><i class="fa fa-table"></i> Retiradas <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="devolucoes.php"><i class="fa fa-bar-chart-o"></i> Devoluções <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <!--
                            <li><a href="suspensoes.php"><i class="fa fa-bar-chart-o"></i> Suspensões <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                            -->
                            <li><a href="historico.php"><i class="fa fa-bar-chart-o"></i> Histórico <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                            <li><a href="livros.php"><i class="fa fa-desktop"></i> Livros <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="adicionar_livros.php"><i class="fa fa-edit"></i> Adicionar livro <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="recados.php"><i class="fa fa-mail-forward"></i> Recados <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/astronauta.png" alt=""><?php echo $_SESSION["librarian"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="editar_perfil.php"><i class="fa fa-sign-out pull-right"></i> Editar perfil</a></li>
                            <li><a href="editar_regras.php"><i class="fa fa-sign-out pull-right"></i> Editar regras</a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                            </ul>
                        </li>

                       
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->