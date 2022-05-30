<?php
include "../usuario/componentes_funcoes/connection.php";
include "../bibliotecario/componentes_funcoes/regras_biblioteca.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro usuário  | BiblioFateca</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon_bibliofateca.png" type="image/x-icon">
</head>

<br>

<div class="col-lg-12 text-center ">
<br><br>
    <h1 style="font-family:Lucida Console"></h1>
    
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
            
        
                <br><br>
                <h2 style="color: white; font-size: 20px"><b>Cadastro de Usuário</b></h2><br>

                <div>
                    <input type="text" class="form-control" placeholder="Nome Completo" name="nome_completo_usuario" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Senha" name="senha_usuario" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="E-mail" name="email" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Nº Celular (11)11111-1111" name="contact" required="" />
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="RA (Registro do Aluno)" name="enrollment" required="" />
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit" style="font-weight: bold;" type="submit" name="submit1" value="Registrar">
                </div>

            </form>
        </section>

        <?php

        if(isset($_POST["submit1"])) {
                $email=$_POST["email"];
                $result2 = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$email'");
            if(mysqli_num_rows($result2) > 0) {
            ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                E-mail '<?php echo $_POST["email"]; ?>' já cadastrado
                </div>
            <?php     
            } else {
                mysqli_query($link, "INSERT INTO cadastro_usuarios VALUES('','$_POST[nome_completo_usuario]','','$_POST[senha_usuario]','$_POST[email]','$_POST[contact]','$_POST[enrollment]','INATIVO','usuário')");
        
            ?> 
                <script type="text/javascript">
                alert("Cadastro concluído, estimativa para aprovação: até <?php echo $prazo_aprovacao_cadastro ?> dias úteis");
                window.location="login.php";
                </script>  
            <?php
        }
    }
    
        ?>

    </div>

</body>

</html>


<style>
    body {
    background-color: #2d2e32 !important;
    }
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