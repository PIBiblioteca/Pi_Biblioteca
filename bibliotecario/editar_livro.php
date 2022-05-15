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
                        <h3>Editar livro</h3>
                        <br>
                    </div>

                   
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Editar informações do livro</h2>

                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="x_content">

                            <?php
                            
                            
                            $id_livro=$_GET['id_livro'];
                            $res=mysqli_query($link,"SELECT * FROM livros WHERE id_livro='$id_livro'");
                            while($row=mysqli_fetch_array($res))
                            {                                
                                
                                
                                $titulo_livro=$row["titulo_livro"];
                                $categoria_livro=$row["categoria_livro"];
                                $dst=$row["imagem_livro"];
                                $autor_livro=$row["autor_livro"];
                                $quantidade_livro=$row["quantidade_livro"];
                                $isbn_livro=$row["isbn_livro"];
                                
                                $edicao_livro=$row["edicao_livro"];
                                
                                $quantidade_disponivel=$row["quantidade_disponivel"];
                                $editora_livro=$row["editora_livro"];
                                
                            }
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Categoria <input type="text" class="form-control" placeholder="Categoria" name="categoria_livro" value="<?php echo $categoria_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Título<input type="text" class="form-control" placeholder="Título" name="titulo_livro" value="<?php echo $titulo_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>ISBN<input type="text" class="form-control" placeholder="ISBN" name="isbn_livro" value="<?php echo $isbn_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Imagem atual <br><img src="<?php echo $dst; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    Escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Autor<input type="text" class="form-control" placeholder="Autor Livro" name="autor_livro" value="<?php echo $autor_livro; ?>"required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Editora<input type="text" class="form-control" placeholder="Publication Name" name="editora_livro" value="<?php echo $editora_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Edição<input type="text" class="form-control" placeholder="Edição" name="edicao_livro" value="<?php echo $edicao_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade<input type="text" class="form-control" placeholder="Books Quantity" name="quantidade_livro" value="<?php echo $quantidade_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade disponível<input type="text" class="form-control" placeholder="Available Quantity" name="quantidade_disponivel" value="<?php echo $quantidade_disponivel; ?>" required=""></td>
                                    </tr>
                                </table>
                                <input type="submit" name="submit1" value="Confirmar" style="padding: 5px 10px; color: white; background-color: green; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px; margin-bottom: 15px">
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
    $id_livro=$_GET['id_livro'];
    
    

    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="../images/books_image/".$tm.$fnm;
        $dst1="../images/books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            // ATUALIZA TABELA "livros"
            mysqli_query($link, "UPDATE livros SET titulo_livro='$_POST[titulo_livro]', categoria_livro='$_POST[categoria_livro]', autor_livro ='$_POST[autor_livro]', editora_livro ='$_POST[editora_livro]', edicao_livro ='$_POST[edicao_livro]',  quantidade_livro ='$_POST[quantidade_livro]', quantidade_disponivel ='$_POST[quantidade_disponivel]' WHERE id_livro='$id_livro'");

            // ATUALIZA TABELA "EMPRESTIMOS"
            mysqli_query($link, "UPDATE emprestimos SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
            // ATUALIZA TABELA "SOLICITACOES"
            mysqli_query($link, "UPDATE solicitacoes SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
            // ATUALIZA TABELA "SUSPENSOES"
            mysqli_query($link, "UPDATE suspensoes SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        }
        else
        {
        // ATUALIZA TABELA "livros"
        mysqli_query($link, "UPDATE livros SET categoria_livro='$_POST[categoria_livro]', titulo_livro='$_POST[titulo_livro]', imagem_livro='$dst1', autor_livro ='$_POST[autor_livro]', editora_livro ='$_POST[editora_livro]', edicao_livro ='$_POST[edicao_livro]', quantidade_livro ='$_POST[quantidade_livro]', quantidade_disponivel ='$_POST[quantidade_disponivel]' WHERE id_livro='$id_livro'");
        // ATUALIZA TABELA "EMPRESTIMOS"
        mysqli_query($link, "UPDATE emprestimos SET books_name='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        // ATUALIZA TABELA "SOLICITACOES"
        mysqli_query($link, "UPDATE solicitacoes SET books_name='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        // ATUALIZA TABELA "SUSPENSOES"
        mysqli_query($link, "UPDATE suspensoes SET books_name='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        }
    ?>
    
        <script type="text/javascript">
            alert("Edição concluída com sucesso");
            window.location="livros.php";
        </script>
    
    <?php
    
    }
?>


<?php
include "../bibliotecario/componentes_funcoes/footer.php";
?>

       