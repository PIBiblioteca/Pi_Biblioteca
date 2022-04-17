<?php
session_start(); // carrega info de sessão ativa
<<<<<<< HEAD:bibliotecaria/login.php
include "../componentes_funcoes/connection.php";
=======
include "connection.php";
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/librarian/login.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BiblioFateca | Login Bibliotecária</title>

    <!-- Bootstrap -->
<<<<<<< HEAD:bibliotecaria/login.php
    <link rel="stylesheet" href="../../Pi_Biblioteca/css/geral.css"> 
=======
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/librarian/login.php
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon_bibliofateca.png" type="image/x-icon">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">BiblioFateca</h1>
</div>

<br>

<body class="login">

<style>

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

<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Login Bibliotecária</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="E-mail" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Senha" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <a class="reset_pass" href="#">Perdeu sua senha?</a>
            </div>

            <div class="clearfix"></div>

            
        </form>
    </section>

</div>

<?php
    if(isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM cadastro_bibliotecaria WHERE username='$_POST[username]' && password='$_POST[password]'");
        $count = mysqli_num_rows($res);

        if ($count == 0) {
    ?>
            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                Usuário ou senha <strong>incorretos</strong>
            </div>
    <?php
        } else {
            $_SESSION["librarian"]=$_POST["username"];
            ?>
            <script type="text/javascript">
                window.location="cadastros.php";
            </script>
            <?php
        }
    }

?>

</body>
</html>
