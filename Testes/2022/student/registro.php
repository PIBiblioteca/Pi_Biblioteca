<?php
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

    <title>Cadastro usuário  | BiblioFateca</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/GitHub/Pi_Biblioteca/img/favicon_bibliofateca.png" type="image/x-icon">
</head>

<br>

<div class="col-lg-12 text-center ">
<br><br>
    <h1 style="font-family:Lucida Console">BiblioFateca</h1>
    
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h2>Registro de Usuário</h2><br>

                <div>
                    <input type="text" class="form-control" placeholder="Nome Completo" name="fullname" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Senha" name="password" required="" />
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
                    <input class="btn btn-default submit " type="submit" name="submit1" value="Registrar">
                </div>

            </form>
        </section>

        <?php

        if(isset($_POST["submit1"])) {
                echo "teste";
                $email=(isset($_POST["email"]));
                echo $email;
                $result2 = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$email'");
            if(mysqli_num_rows($result2) > 0) {
            ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                E-mail '<?php echo (isset($_POST["email"])); ?>' já cadastrado
                </div>
            <?php     
            } else {
                mysqli_query($link, "INSERT INTO cadastro_usuarios VALUES('','$_POST[fullname]','','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[enrollment]','INATIVO')");
            ?> 
                <script type="text/javascript">
                //alert("Registro concluído, aguarde até 3 dias para aprovação");
                //window.location="login.php";
                </script>  
            <?php
        }
    }
    
        ?>

    </div>

</body>

</html>