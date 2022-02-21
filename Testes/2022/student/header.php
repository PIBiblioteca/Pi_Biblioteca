<?php
include "connection.php";
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
    $image="teste";
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


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>BiblioFateca</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo $image; ?>" alt="..." class="img-circle profile_img">
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
                            <li><a href="meus_emprestimos.php"><i class="fa fa-home"></i> Meus empréstimos <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="livros.php"><i class="fa fa-edit"></i> Buscar livros <span class="fa fa-chevron-down"></span></a>

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
                                <li><a href="editar_perfil.php?id=<?php echo $_SESSION["username"]; ?>"><i class="fa fa-sign-out pull-right"></i> Editar perfil</a></li>
                                <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                            </ul>
                            
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="recados.php" class="dropdown-toggle info-number" data-toggle="dropdown"
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