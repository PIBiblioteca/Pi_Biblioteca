<?php
session_start();
include "..\usuario\componentes_funcoes\connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon_bibliofateca.png" type="image/x-icon">
    
    <title>BiblioFateca | Login Usuário</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href=".."> 
    <link href="..\usuario\css\bootstrap.min.css" rel="stylesheet">
    <link href="..\usuario\css\animate.min.css" rel="stylesheet">
    <link href="..\usuario\css\custom.min.css" rel="stylesheet"> 
    <link href="..\usuario\css\geral.css" rel="stylesheet">
    
</head>

<br>

<div class="container">

<br>

<body class="login">

<style>

    a {
        text-shadow: none !important;
        color: white !important;
        
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

    body {
    background-color: #013a46 !important;
    color: #1c9bb5 !important;
    font-family: sans-serif !important;
}

</style>
    <div class="login_wrapper">

        <section class="login_content">
            <form name="form1" action="" method="post">
            <img src="../images/logo_bibliofateca.png" alt=""style="width: 160px"> 
                <br><br>
                <h1 style="color: white">Login de Usuário</h1>

                <div>
                    <input type="text" name="email" class="form-control" placeholder="E-mail" required="" />
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Senha" required="" />
                </div>
                <div>

                    <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                    <a class="reset_pass" href="#">Perdeu sua senha?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Novo aqui?
                        <a href="cadastro.php"> Crie sua conta </a>
                    </p>

                    <div class="clearfix"></div>
                    <br>


                </div>
            </form>
        </section>


    </div>

    <?php
    
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$_POST[email]' && password='$_POST[password]' && (status_usuario='ATIVO' OR status_usuario='SUSPENSO')");
        $count = mysqli_num_rows($res);

        if ($count == 0) {
    ?>
            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                <strong style="color:white">Senha ou usuário inválido</strong> 
            </div>
    <?php
        } else {
            $_SESSION["email"]=$_POST["email"];
            ?>
            <script type="text/javascript">
                window.location="meus_emprestimos.php";
            </script>
            <?php
        }
    }
    ?>


</body>

<style>
.logo{
    position: sticky;
    top:0;
    float: right;
    z-index: 10;
    height: 60px;
    width: 60px;
    margin-right: 15px;
    margin-top:15px;
    margin-bottom: 0px;
}
</style>

</html>