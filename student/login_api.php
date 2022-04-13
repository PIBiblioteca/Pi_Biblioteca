<?php
session_start();
include "../librarian/componentes_funcoes/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">

    <title>BiblioFateca | Login Usuário</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<br>

<div class="col-lg-12 text-center ">
    <br>
    <h1 style="font-family:Lucida Console; margin: auto"> BiblioFateca </h1>
</div>

<br>

<body class="login">


    <div class="login_wrapper">

        <section class="login_content">
                <h1>Login de Usuário</h1>

                <div>
                    <input type="text" id="ra" name="ra" class="form-control" placeholder="RA" required="" />
                </div>
                <div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required="" />
                </div>
                <div>

                    <button class="btn btn-default submit" onclick="submitForm()">
                        Login
                    </button>
                    <a class="reset_pass" href="#">Perdeu sua senha?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Novo aqui?
                        <a href="cadastro.php"> Crie sua conta </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />


                </div>
        </section>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function submitForm() {
        console.log($("#ra").val())

        $.post('http://localhost:3000/login', { // depois carregar Heroku aqui
            "usuario": $("#ra").val(),
            "senha": $("#password").val()
        }, function(response) {
            if (response.result) {
                
                //if // verificar se usuário está no BD local, se estiver, permitir seguir
                //if // verificar se usuário está no BD da API, se não estiver, excluir do BD local, caso contrário, permitir seguir
                window.location="meus_emprestimos.php";
            } else {
                // <div class="alert alert-danger col-lg-6 col-lg-push-3">
                //     <strong style="color:white">Senha ou usuário inválido</strong> 
                // </div>
            }
        });
    }
   
</script>

</html>

<!-- $count = 0;
$res = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$_POST[email]' && password='$_POST[password]' && (status_usuario='ATIVO' OR status_usuario='SUSPENSO')");
$count = mysqli_num_rows($res); -->

<!-- <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Senha ou usuário inválido</strong> 
</div> -->
   