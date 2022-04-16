<?php
<<<<<<< HEAD:usuario/componentes_funcoes/header.php
include "..\bibliotecaria\componentes_funcoes\contadores.php";
=======
include "connection.php";
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/header.php
$email=$_SESSION['email'];
//menu de usuário, foto e nome

$res=mysqli_query($link,"SELECT * FROM cadastro_usuarios WHERE email='$email'");
        while($row=mysqli_fetch_array($res))
        {                                
            $image=$row["profile_image"];
            $fullname=$row["fullname"];
        }
//fim menu de usuário

//Menu de recados
$tot=0;
$res=mysqli_query($link, "SELECT * FROM recados WHERE dusername='$fullname' && read1='n'");
$tot=mysqli_num_rows($res);
//Fim menu de recados

$res=mysqli_query($link,"SELECT * FROM cadastro_usuarios WHERE email='$email'");
        while($row=mysqli_fetch_array($res))
        {                                
            $image=$row["profile_image"];
            $fullname=$row["fullname"];
        }
if($image==''){
    $image="images/astronauta.png";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BiblioFateca </title>

<<<<<<< HEAD:usuario/componentes_funcoes/header.php
    <link rel="stylesheet" href="..\usuario\css\geral.css"> 
    <!-- 
        Dicas de navegação nos diretórios
        ./          - referencia o diretorio/pasta atual
        ./ = voltar para raiz 
        ../ = voltar uma pasta
    -->
    <link href="..\usuario\css\bootstrap.min.css" rel="stylesheet">
    <link href="..\usuario\css\font-awesome.min.css" rel="stylesheet">
    <link href="..\usuario\css\nprogress.css" rel="stylesheet">
    <link href="..\usuario\css\custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="..\img\favicon_bibliofateca.png" type="image/x-icon">
=======

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/header.php
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
<<<<<<< HEAD:usuario/componentes_funcoes/header.php
                    <a href="..\usuario\meus_emprestimos.php" class="site_title"><img src="..\images\favicon_bibliofateca.png" alt=""style="width: 45px"> <span>Biblio<b>Fatec</b>a</span></a>
=======
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>BiblioFateca</span></a>
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/header.php
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
                        <img style="width: 60px; height:60px" src="<?php echo $image; ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Olá,</span>

                        <h2><?php echo $fullname; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                            <li><a href="..\usuario\meus_emprestimos.php"><i class="fa fa-home"></i> Meus empréstimos <span class="fa fa-chevron-down"></span></a>
                            </li>

                            <li><a href="..\usuario\livros.php"><i class="fa fa-edit"></i> Buscar livros <span class="fa fa-chevron-down"></span></a>
                            </li>
                            
                            <li><a href="..\usuario\regras_biblioteca.php"><i class="fa fa-edit"></i> Regras da biblioteca <span class="fa fa-chevron-down"></span></a>
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
                                <img src="<?php echo $image; ?>" alt=""><?php echo $fullname; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="editar_perfil.php?id=<?php echo $fullname; ?>"><i class="fa fa-sign-out pull-right"></i> Editar perfil</a></li>
                                <li><a href="..\usuario\login.php"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                            </ul>
                            
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="..\usuario\componentes_funcoes\recados.php" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o" onclick="window.location='recados.php'"></i>
                                <span class="badge bg-green" onclick="window.location='recados.php'"><?php echo $tot; ?></span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->