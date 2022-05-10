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
                                $dst=$row["imagens/books_image"];
                                $bauthorname=$row["books_author_name"];
                                $bqty=$row["books_qty"];
                                
                                $edicao=$row["edicao"];
                                $bprice=$row["books_price"];
                                
                                $aqty=$row["available_qty"];
                                $pname=$row["books_publication_name"];
                                
                            }
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nome do livro<input type="text" class="form-control" placeholder="Books Name" name="titulo_livro" value="<?php echo $titulo_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Categoria do livro<input type="text" class="form-control" placeholder="Categoria" name="categoria_livro" value="<?php echo $titulo_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>ISBN do livro<input type="text" class="form-control" placeholder="ISBN" name="isbn_livro" value="<?php echo $titulo_livro; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Imagem atual <br><img src="<?php echo $dst; ?>" height="100" width="100">
                                    <br>
                                    <br>
                                    Escolher imagem nova<input type="file" name="f1" value=""></td>
                                    </tr>
                                    <tr>
                                        <td>Autor<input type="text" class="form-control" placeholder="Books Author Name" name="bauthorname" value="<?php echo $bauthorname; ?>"required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Editora<input type="text" class="form-control" placeholder="Publication Name" name="pname" value="<?php echo $pname; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Edição<input type="text" class="form-control" placeholder="Edição" name="edicao" value="<?php echo $edicao; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Preço<input type="text" class="form-control" placeholder="Books Price" name="bprice" value="<?php echo $bprice; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade<input type="text" class="form-control" placeholder="Books Quantity" name="bqty" value="<?php echo $bqty; ?>" required=""></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade disponível<input type="text" class="form-control" placeholder="Available Quantity" name="aqty" value="<?php echo $aqty; ?>" required=""></td>
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
    $id_livro=$_GET['id_livro'];
    
    

    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./imagens/books_image/".$tm.$fnm;
        $dst1="./imagens/books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            // ATUALIZA TABELA "livros"
            mysqli_query($link, "UPDATE livros SET titulo_livro='$_POST[titulo_livro]', categoria_livro='$POST[categoria_livro]', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', edicao ='$_POST[edicao]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id_livro='$id_livro'");

            // ATUALIZA TABELA "EMPRESTIMOS"
            mysqli_query($link, "UPDATE emprestimos SET categoria_livro='$POST[categoria_livro]', titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
            // ATUALIZA TABELA "SOLICITACOES"
            mysqli_query($link, "UPDATE solicitacoes SET categoria_livro='$POST[categoria_livro]', titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
            // ATUALIZA TABELA "SUSPENSOES"
            mysqli_query($link, "UPDATE suspensoes SET categoria_livro='$POST[categoria_livro]', titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        }
        else
        {
        // ATUALIZA TABELA "livros"
        mysqli_query($link, "UPDATE livros SET titulo_livro='$_POST[titulo_livro]', imagens/books_image='$dst1', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', edicao ='$_POST[edicao]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id_livro='$id_livro'");
        // ATUALIZA TABELA "EMPRESTIMOS"
        mysqli_query($link, "UPDATE emprestimos SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        // ATUALIZA TABELA "SOLICITACOES"
        mysqli_query($link, "UPDATE solicitacoes SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
        // ATUALIZA TABELA "SUSPENSOES"
        mysqli_query($link, "UPDATE suspensoes SET titulo_livro='$_POST[titulo_livro]' WHERE titulo_livro='$titulo_livro'");
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

       