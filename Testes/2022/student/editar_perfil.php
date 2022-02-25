<?php
session_start();
// código de segurança para impossibilitar o acesso à essa página sem fazer login
if(!isset($_SESSION["email"])) 
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
// fim do código de segurança para impossibilitar o acesso à essa página sem fazer login
include "connection.php";
include "header.php";
?>
<a href="/Testes/2022/librarian/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar perfil</h3>
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
                            
                            $email=$_SESSION['email'];
                            $res=mysqli_query($link,"SELECT * FROM cadastro_usuarios WHERE email='$email'");
                            while($row=mysqli_fetch_array($res))
                            {                                
                                $firstname=$row["fullname"];
                                $image=$row["profile_image"];
                                $password=$row["password"];
                                $email=$row["email"];
                                $contact=$row["contact"];                              
                            }
                            
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                
                                    <tr>
                                        <td>Nome completo<input type="text" class="form-control" placeholder="First Name" name="fullname" value="<?php echo $firstname; ?>" required=""></td>

                                    </tr>
                                    <tr>
                                        <td>imagem atual<br><img src="<?php echo $image; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Senha<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>" required=""><button class="btn btn-default">mudar senha</button></td>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
   

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
include "footer.php";
?>
