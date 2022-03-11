<?php
session_start();
if(!isset($_SESSION["email"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Recados</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Mudar senha</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                    $email=$_SESSION['email'];
                                    $res=mysqli_query($link,"SELECT * FROM cadastro_usuarios WHERE email='$email'");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        $password=$row["password"];
                                    }
                                ?>
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <input type="password" class="form-control" placeholder="Senha atual" name="senha_atual" required="" />
                                            <?php
                                            
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="password" class="form-control" placeholder="Nova senha" name="nova_senha" required="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="password" class="form-control" placeholder="Confirmar nova senha" name="confirmar_senha" required="" />
                                        </td>   
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit1" class="btn btn-default submit" value="Confirmar" style="background-color: green; color: white">
                                        </td>   
                                    </tr>
                                </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php

    if(isset($_POST["submit1"])) {
        echo (($_POST["senha_atual"]));
        echo "<br>";
        echo $password;
        echo "<br>";
        if($_POST["senha_atual"]==$password){
            echo "senha correta <br>";
            if (($_POST["nova_senha"])==($_POST["confirmar_senha"])) {
                echo "Confirmação correta";
                // ATUALIZA TABELA "cadastro_bibliotecaria"
                mysqli_query($link, "UPDATE cadastro_usuarios SET password='$_POST[nova_senha]' WHERE email='$email'");
                ?>
                    <script type="text/javascript">
                        alert("Senha atualizada com sucesso");
                        window.location="editar_perfil.php";
                    </script>
                <?php
            } else {
                ?>
                    <script type="text/javascript">
                        alert("Confirmação de senha não confere");
    //                        window.location="adicionar_livros.php";
                    </script>
                <?php
            
        }
    } else {
            ?>
            <script type="text/javascript">
                alert("Senha atual incorreta");
            </script>
            <?php
        }



        
    }

    
    

    ?>
<?php
include "footer.php";
?>

       