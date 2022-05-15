<?php
session_start();
// código de segurança para impossibilitar o acesso à essa página sem fazer login
if(!isset($_SESSION["bibliotecario"])) 
{
    ?>
    <script type="text/javascript">
        window.location="../usuario/login.php";

    </script>
    <?php
}
// fim do código de segurança para impossibilitar o acesso à essa página sem fazer login
include "../bibliotecario/componentes_funcoes/connection.php";
include "../bibliotecario/componentes_funcoes/header.php";
?>
<a href="/Testes/2022/bibliotecario/imagens/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar prazos</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Prazos do sistema</h2>

                                <div class="clearfix"></div>
                            </div>
                            <?php
                            
                            $email=$_SESSION['bibliotecario'];
                            $res=mysqli_query($link,"SELECT * FROM prazos_biblioteca");
                            while($row=mysqli_fetch_array($res))
                            {
                                $prazo_aprovacao_cadastro=$row["prazo_aprovacao_cadastro"];
                                $prazo_retirada_livro=$row["prazo_retirada_livro"];
                                $prazo_devolucao_livro=$row["prazo_devolucao_livro"];
                                $prazo_suspensao_usuario=$row["prazo_suspensao_usuario"];
                                $horario_funcionamento=$row["horario_funcionamento"];
                            }
                            
                            $image="images/astronauta.png";
                            
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <div id='container'>
                                <table class="table table-bordered">
                                
                                    <tr>
                                        <td>Aprovação estimada de cadastros (em dias)<input type="text" class="form-control" placeholder="'X' dias" name="prazo_aprovacao_cadastro" value="<?php echo $prazo_aprovacao_cadastro; ?>" required=""></td>

                                    </tr>
                                    <tr>
                                        <td>Retirada de livros (em dias)<input type="text" class="form-control" placeholder="'X' dias" name="prazo_retirada_livro" value="<?php echo $prazo_retirada_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Devolução de livros (em dias)<input type="text" class="form-control" placeholder="'X' dias" name="prazo_devolucao_livro" value="<?php echo $prazo_devolucao_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Suspensão de usuários (em dias)<input type="text" class="form-control" placeholder="'X' dias" name="prazo_suspensao_usuario" value="<?php echo $prazo_suspensao_usuario; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Horário de funcionamento<input type="text" class="form-control" placeholder="Descrever onde, como, quando e com quem tratar para retirar livros" name="horario_funcionamento" value="<?php echo $horario_funcionamento; ?>" required=""></td>
                                    </tr>
                                    
                                </table>
                                <input type="submit" name="submit1" value="Confirmar"style="padding: 5px 10px; color: white; background-color: green; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px; margin-bottom: 15px">
                                </div>
                                </form>

                               
                                </div>
                               
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
        // ATUALIZA TABELA "recados"
        mysqli_query($link, "UPDATE prazos_biblioteca SET prazo_aprovacao_cadastro='$_POST[prazo_aprovacao_cadastro]', prazo_retirada_livro='$_POST[prazo_retirada_livro]', prazo_devolucao_livro='$_POST[prazo_devolucao_livro]', prazo_suspensao_usuario='$_POST[prazo_suspensao_usuario]', horario_funcionamento='$_POST[horario_funcionamento]', regras_gerais='$_POST[regras_gerais]'");
    ?>
    
        <script type="text/javascript">
            alert("Edição concluída com sucesso");
            window.location="editar_regras.php";
        </script>
    
    <?php
        }
?>


<?php
include "../bibliotecario/componentes_funcoes/footer.php";
?>

       