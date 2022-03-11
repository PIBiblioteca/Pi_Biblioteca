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
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Livros cadastrados</h3>
                    </div>
                    <!-- menu pesquisa -->
                    <form name="form1" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">

                                        <input type="text" name="t1" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-btn">
                                                <button type="submit" name="submit1" id="search books" class="btn btn-default">OK</button>
                                            </span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- / menu pesquisa -->
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
                                        echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
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
                                    echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php echo "</td>";
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
include "footer.php";
?>

       