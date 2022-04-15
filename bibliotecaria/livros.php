<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "../bibliotecaria/componentes_funcoes/connection.php";
include "../bibliotecaria/componentes_funcoes/header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Livros cadastrados</h3>
                    </div>
                    <?php include "../bibliotecaria/componentes_funcoes/botao_pesquisar.php";//BOTÃO PESQUISAR?> 
                </div>
                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Informações de todos os livros</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <a href="../componentes_funcoes/adicionar_livros.php"><i class="fa fa-edit"></i> Adicionar livro <span class="fa fa-chevron-down"></span></a>
                                <?php 
                                
                                // RESULTADO COM PESQUISA
                                if(isset($_POST["submit1"])) {
                                    $res=mysqli_query($link, "SELECT * FROM adicionar_livros 
                                    WHERE books_name LIKE('%$_POST[t1]%')
                                    OR books_author_name LIKE('%$_POST[t1]%')
                                    OR books_publication_name LIKE('%$_POST[t1]%')
                                    OR edicao LIKE('%$_POST[t1]%')
                                    ");
                                    $contador=0; //contador para exibir resultado caso while não der retorno
                                    while($row = mysqli_fetch_array($res)) {
                                    $contador=$contador+1; 

                                    if ($contador == 1) { //contador para não exibir a tabela duas vezes quando a pesquisa dá mais de um resultado

                                    echo "<div id='container'>";
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Imagem do livro"; echo "</th>";
                                    echo "<th>"; echo "Nome do livro"; echo "</th>";
                                    echo "<th>"; echo "Nome do autor"; echo "</th>";
                                    echo "<th>"; echo "Editora"; echo "</th>";
                                    echo "<th>"; echo "Edição"; echo "</th>";
                                    echo "<th>"; echo "Preço"; echo "</th>";
                                    echo "<th>"; echo "Quantidade"; echo "</th>";
                                    echo "<th>"; echo "Disponíveis"; echo "</th>";
                                    echo "<th>"; echo "Deletar Livro"; echo "</th>";
                                    echo "<th>"; echo "Editar Livro"; echo "</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; ?> <img src="<?php echo $row["imagens/books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                        echo "<td>"; echo $row["books_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                        echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                        echo "<td>"; echo $row["edicao"]; echo "</td>";
                                        echo "<td>"; echo $row["books_price"]; echo "</td>";
                                        echo "<td>"; echo $row["books_qty"]; echo "</td>";
                                        echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                        echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php echo "</td>";
                                        echo "<td>"; ?> <a href="editar_livro.php?id=<?php echo $row["id"]; ?>">Edit Book</a> <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    echo "</div>";
                                }
                                }
                                if ($contador==0){
                                    echo "'$_POST[t1]' não encontrado";
                                }

                            }
                                else // RESULTADO SEM PESQUISA
                                { 

                                $res=mysqli_query($link, "SELECT * FROM adicionar_livros");
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Imagem do livro"; echo "</th>";
                                echo "<th>"; echo "Nome do livro"; echo "</th>";
                                echo "<th>"; echo "Nome do autor"; echo "</th>";
                                echo "<th>"; echo "Editora"; echo "</th>";
                                echo "<th>"; echo "Edição"; echo "</th>";
                                echo "<th>"; echo "Preço"; echo "</th>";
                                echo "<th>"; echo "Quantidade"; echo "</th>";
                                echo "<th>"; echo "Disponíveis"; echo "</th>";
                                echo "<th>"; echo "Deletar Livro"; echo "</th>";
                                echo "<th>"; echo "Editar Livro"; echo "</th>";
                                echo "</tr>";
                                while($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; ?> <img src="<?php echo $row["imagens/books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                    echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                    echo "<td>"; echo $row["edicao"]; echo "</td>";
                                    echo "<td>"; echo $row["books_price"]; echo "</td>";
                                    echo "<td>"; echo $row["books_qty"]; echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                    echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Deletar</a> <?php echo "</td>";
                                    echo "<td>"; ?> <a href="editar_livro.php?id=<?php echo $row["id"]; ?>">Editar</a> <?php echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "../componentes_funcoes/footer.php";
?>

       