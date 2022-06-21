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
                        <h3>Editar regulamento</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Regulamento da biblioteca</h2>

                                <div class="clearfix"></div>
                            </div>
                            <a style="padding: 5px 10px; color: white; background-color: #428bca; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px;" href="delete_books.php?id=<?php echo $row["id_regra"]; ?>">Adicionar nova regra</a>
                            <br><br>
                            <?php
                            
                             
                         
                            $res=mysqli_query($link,"SELECT * FROM regras_biblioteca"); ?>
                                <div id='container'>
                                <?php while($row = mysqli_fetch_array($res)) { ?>
                                <table class="table table-bordered">
                                
                                    <tr>
                                        <td style="width: 0px">Id<input type="text" style="width: 50px" class="form-control" placeholder="'X' id" name="id_regra" value="<?php echo $row["id_regra"]; ?>" required=""></td>

                                  
                                        <td>Regra<input type="text" class="form-control" placeholder="'X' dias" name="regra" value="<?php echo $row["regra"]; ?>" required=""></td>

                                        <td style="padding-top: 35px; width: 0px;"> <a style="align: center; padding: 5px 10px; color: white; background-color: brown; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin-top: 50px;" href="delete_books.php?id=<?php echo $row["id_regra"]; ?>">Excluir</a> </td>
                                    </tr>
                                    
                                <?php } ?> 
                                    
                                 
                                    
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
        </div>

        
        <!-- /page content -->

<?php
   
    if(isset($_POST["submit1"]))
        {
        // ATUALIZA TABELA "reulamento"
        mysqli_query($link, "UPDATE _biblioteca SET prazo_aprovacao_cadastro='$_POST[prazo_aprovacao_cadastro]', prazo_retirada_livro='$_POST[prazo_retirada_livro]', prazo_devolucao_livro='$_POST[prazo_devolucao_livro]', prazo_suspensao_usuario='$_POST[prazo_suspensao_usuario]', horario_funcionamento='$_POST[horario_funcionamento]', regras_gerais='$_POST[regras_gerais]'");
    ?>
    
        <script type="text/javascript">
            alert("Edição concluída com sucesso");
            window.location="editar_regras.php";
        </script>
    
    <?php
        }
?>


<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../js/fastclick.js"></script>
<!-- NProgress -->
<script src="../js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../js/custom.min.js"></script>
       