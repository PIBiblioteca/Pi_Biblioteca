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
include "connection.php";
include "header.php";
?>
<a href="/Testes/2022/librarian/books_image/"></a>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar livro</h3>
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
                            
                            
                            $id=$_GET['id'];
                            $res=mysqli_query($link,"SELECT * FROM adicionar_livros WHERE id='$id'");
                            while($row=mysqli_fetch_array($res))
                            {                                
                                $booksname=$row["books_name"];
                                $dst=$row["books_image"];
                                $bauthorname=$row["books_author_name"];
                                $pname=$row["books_publication_name"];
                                $edicao=$row["edicao"];
                                $bprice=$row["books_price"];
                                $bqty=$row["books_qty"];
                                $aqty=$row["available_qty"];
                                
                            }
                            ?>
                            
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nome do livro<input type="text" class="form-control" placeholder="Books Name" name="booksname" value="<?php echo $booksname; ?>" required=""></td>
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
    $id=$_GET['id'];
    
    

    if(isset($_POST["submit1"]))
    {        
        
        $tm=md5 (time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="./books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

        if($fnm =='') //verifica se o campo de imagem está vazio
        {
            // ATUALIZA TABELA "ADICIONAR_LIVROS"
            mysqli_query($link, "UPDATE adicionar_livros SET books_name='$_POST[booksname]', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', edicao ='$_POST[edicao]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id='$id'");

            // ATUALIZA TABELA "EMPRESTIMOS"
            mysqli_query($link, "UPDATE emprestimos SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
            // ATUALIZA TABELA "SOLICITACOES"
            mysqli_query($link, "UPDATE solicitacoes SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
            // ATUALIZA TABELA "SUSPENSOES"
            mysqli_query($link, "UPDATE suspensoes SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
        }
        else
        {
        // ATUALIZA TABELA "ADICIONAR_LIVROS"
        mysqli_query($link, "UPDATE adicionar_livros SET books_name='$_POST[booksname]', books_image='$dst1', books_author_name ='$_POST[bauthorname]', books_publication_name ='$_POST[pname]', edicao ='$_POST[edicao]', books_price ='$_POST[bprice]', books_qty ='$_POST[bqty]', available_qty ='$_POST[aqty]' WHERE id='$id'");
        // ATUALIZA TABELA "EMPRESTIMOS"
        mysqli_query($link, "UPDATE emprestimos SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
        // ATUALIZA TABELA "SOLICITACOES"
        mysqli_query($link, "UPDATE solicitacoes SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
        // ATUALIZA TABELA "SUSPENSOES"
        mysqli_query($link, "UPDATE suspensoes SET books_name='$_POST[booksname]' WHERE books_name='$booksname'");
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
include "footer.php";
?>

       