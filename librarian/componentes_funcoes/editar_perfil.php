<?php
session_start();
// código de segurança para impossibilitar o acesso à essa página sem fazer login
if(!isset($_SESSION["librarian"])) 
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
// fim do código de segurança para impossibilitar o acesso à essa página sem fazer login
include "../librarian/componentes_funcoes/connection.php";
include "../librarian/componentes_funcoes/header.php";
?>
<a href="/Testes/2022/librarian/imagens/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar perfil</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar informações da conta</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <?php
                            
                            $email=$_SESSION['librarian'];
                            $res=mysqli_query($link,"SELECT * FROM cadastro_bibliotecaria");
                            while($row=mysqli_fetch_array($res))
                            {
                                $firstname=$row["firstname"];
                                $lastname=$row["lastname"];
                                $username=$row["username"];
                                $password=$row["password"];
                                $email=$row["email"];
                                $contact=$row["contact"];                            
                            }
                            
                            $image="images/astronauta.png";
                            
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <div id='container'>
                                <table class="table table-bordered">
                                
                                    <tr>
                                        <td>Primeiro Nome<input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required=""></td>

                                    </tr>
                                    <tr>
                                        <td>imagem atual<br><img src="<?php echo $image; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Senha <br> <button name="mudar_senha" class="btn btn-default">mudar senha</button></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail<input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $email; ?>" disabled=""></td>
                                    </tr>
                                    <tr>
                                        <td>Contato<input type="text" class="form-control" placeholder="Contact" name="contact" value="<?php echo $contact; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="submit1" class="btn btn-default submit" value="Confirmar" style="background-color: green; color: white"></td>
                                    </tr>
                                </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
   
   //botão mudar senha
   if(isset($_POST["mudar_senha"]))
   {
        ?>  
        <script type="text/javascript">
        window.location="mudar_senha.php";
        </script>
        <?php
   }
    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./profile_image/".$tm.$fnm;
        $dst1="./profile_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            // ATUALIZA TABELA "cadastro_usuarios"
            mysqli_query($link, "UPDATE cadastro_usuarios SET fullname='$_POST[fullname]', password ='$_POST[password]', contact ='$_POST[contact]' WHERE email='$email'");
            // ATUALIZA TABELA "emprestimos"
            mysqli_query($link, "UPDATE emprestimos SET student_name='$_POST[fullname]', student_contact ='$_POST[contact]' WHERE student_email='$email'");
            // ATUALIZA TABELA "recados"
            mysqli_query($link, "UPDATE recados SET dusername='$_POST[fullname]' WHERE email='$email'");
            // ATUALIZA TABELA "solicitacoes"
            mysqli_query($link, "UPDATE solicitacoes SET student_name='$_POST[fullname]', student_contact ='$_POST[contact]' WHERE student_email='$email'");
        }
        else //se campo de imagem não estiver vazio
        {
        // ATUALIZA TABELA "cadastro_usuarios"  
        mysqli_query($link, "UPDATE cadastro_usuarios SET fullname='$_POST[fullname]', profile_image='$dst', password ='$_POST[password]', contact ='$_POST[contact]' WHERE email='$email'");
        // ATUALIZA TABELA "emprestimos"
        mysqli_query($link, "UPDATE emprestimos SET student_name='$_POST[fullname]', student_contact ='$_POST[contact]' WHERE student_email='$email'");
        // ATUALIZA TABELA "recados"
        mysqli_query($link, "UPDATE recados SET dusername='$_POST[fullname]' WHERE email='$email'");
        // ATUALIZA TABELA "solicitacoes"
        mysqli_query($link, "UPDATE solicitacoes SET student_name='$_POST[fullname]', student_contact ='$_POST[contact]' WHERE student_email='$email'");
        }
    ?>
    
        <script type="text/javascript">
            alert("Edição concluída com sucesso");
            window.location="editar_perfil.php";
        </script>
    
    <?php
    
    }
?>


<?php
include "../librarian/componentes_funcoes/footer.php";
?>
