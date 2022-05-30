<?php
include "connection.php";
//menu de usuário, nome
$email=$_SESSION['bibliotecario'];
$res=mysqli_query($link,"SELECT * FROM cadastro_usuarios WHERE email='$email'");
        while($row=mysqli_fetch_array($res))
        {                                
            $nome_completo_usuario=$row["nome_completo_usuario"];
        }
//fim menu de usuário
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> BiblioFateca </title>

    <link rel="stylesheet" href="../usuario/css/header.css">

    
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <link href="../js/custom.min.js" rel="stylesheet">
    <link href="../js/nprogress.js" rel="stylesheet">
    <link href="../usuario/css/animate.min.css" rel="stylesheet">
    <link href="../usuario/css/custom.css" rel="stylesheet">
    <link href="../usuario/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/686ced9e11.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="../usuario/css/nprogress.css" rel="stylesheet">
    <link href="../usuario/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon_bibliofateca.png" type="image/x-icon">
</head>
<!--FORÇAR ALTERAÇÃO NO ESTILO (tbm é possível alterar o arquivo "custom.css")-->
<style>
    /* Cores do menu */
.left_col {
    background: #27536b !important;
}
.nav_title {
    background: #27536b !important;
}
.toggle a {
    color: #27536b !important;
}

/* Fim cores do menu */
    a {
        text-shadow: none !important;
        color: white;
    }
    a:hover {
        text-shadow: none !important;
        color: red;
    }
    .login_content {
        text-shadow: none !important;
    }
    .login_content h1:before {
        background: white;
    }
    .login_content h1:after {
        background: white;
    }
</style>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="../bibliotecario/cadastros.php" class="site_title"><img src="..\images\favicon_bibliofateca.png" alt=""style="width: 45px"> <span>Biblio<b>Fatec</b>a</span></a>
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
                        <img style="width: 60px" src="..\images\astronauta.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span style="color: white">Olá,</span>

                        <h2><b></b><?php echo $nome_completo_usuario; ?></b></h2>
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
                            <li><a href="historico.php"><i class="fa fa-table-list"></i> Histórico <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                            <li><a href="livros.php"><i class="fa fa-book"></i> Livros <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="recados.php"><i class="fa fa-mail-forward"></i> Recados <span
                                    class="fa fa-chevron-down"></span></a>
                            
                            <li><a href="sig_biblioteca.php"><i class="fa fa-file-lines"></i> SIG Biblioteca <span class="fa fa-chevron-down"></span></a>
                            </li>

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
                                <img src="..\images\astronauta.png" alt=""><?php echo $nome_completo_usuario; ?>
                                <span class=" fa fa-angle-down"></span>       </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="editar_perfil.php"><i class="fa-solid fa-pen-to-square pull-right"></i> Editar perfil</a></li>
                            <li><a href="editar_prazos.php"><i class="fa-solid fa-pen pull-right"></i> Editar prazos</a></li>
                            <li><a href="editar_regulamento.php"><i class="fa-solid fa-gavel pull-right"></i> Editar regulamento</a></li>
                            <li><a href="componentes_funcoes/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                            </ul>
                        </li>

                       
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->