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
include "..\bibliotecario\componentes_funcoes\connection.php";
include "..\bibliotecario\componentes_funcoes\header.php";
?>
<a href="/imagens/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Adicionar livros</h3>
                        <br>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:750px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Adicionar novos livros ao sistema</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Nome do livro" name="booksname" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Imagem do livro<input type="file" name="f1" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Autor" name="autor_livro" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Editora" name="editora_livro" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Edição" name="edicao" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Preço" name="bprice" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Quantidade" name="quantidade_livro" required=""></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Quantidade disponível" name="quantidade_disponivel" required=""></td>
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
        $dst="./imagens/books_image/".$tm.$fnm;
        $dst1="./imagens/books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        mysqli_query($link, "INSERT INTO livros VALUES('','$_POST[booksname]','$dst1','$_POST[autor_livro]','$_POST[editora_livro]','$_POST[edicao]','$_POST[bprice]','$_POST[quantidade_livro]','$_POST[quantidade_disponivel]','$_SESSION[bibliotecario]')");
    ?>
        <script type="text/javascript">
            alert("Livro adicionado com sucesso!");
            window.location="adicionar_livros.php";
        </script>
    <?php
    
    }
?>


<?php
include "footer.php";
?>

       