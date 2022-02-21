<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Usuário | BiblioFateca</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console"> BiblioFateca </h1>
</div>

<br>

<body class="login">


    <div class="login_wrapper">

        <section class="login_content">
            <form name="form1" action="" method="post">
                <h1>Login de Usuário</h1>

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
                        <a href="registro.php"> Crie sua conta </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />


                </div>
            </form>
        </section>


    </div>

    <?php
    
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$_POST[email]' && password='$_POST[password]' && status_usuario='ATIVO'");
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

</html>