<?php
session_start();
if(!isset($_SESSION["email"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
<<<<<<< HEAD:usuario/livros.php
include "./users/componentes/header.php";
include "./users/componentes/connection.php";

?>

        <!-- page content area main -->
        <link rel="stylesheet" href="../css/geral.css"> 
=======
include "header.php";
include "connection.php"
?>

        <!-- page content area main -->
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/livros.php
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <?php
                            //FUNÇÃO PESQUISAR
                            if(isset($_POST["submit1"])) // pega variável de entrada do usuário
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM adicionar_livros WHERE books_name like('%$_POST[t1]%')"); //função pesquisa: WHERE books_name like('%$_POST[t1]%')
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
<<<<<<< HEAD:usuario/livros.php
                                    echo "<td>"; ?> <img src="../<?php echo $row["imagem_livro"]; ?>" height="100" width="100">  <?php 
=======
                                    echo "<td>"; ?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">  <?php 
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/livros.php
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."</b>";
                                    echo "<br>";
                                    echo "<b>". "Disponíveis: ".$row["available_qty"]."</b>";
                                    
                                    $qtdzero=$row["available_qty"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                        echo "<br>";
                                    echo "<b>"; ?> <a href="solicitar_emprestimo.php?id=<?php echo $row["id"]; ?>">SOLICITAR EMPRÉSTIMO</a> <?php echo "</b>";
                                    }      
                                    
                                    echo "</td>";
                                    ?>
                                    
                                    <?php
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }
                                    
                                }
                                echo "</tr>";
                                echo "</table>";
                                echo "</div>";

                            }
                            else // código de exibir livros
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM adicionar_livros"); //função de exibir somente livros disponíveis: SELECT * FROM adicionar_livros WHERE available_qty>0
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row = mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
<<<<<<< HEAD:usuario/livros.php
                                    echo "<td>"; ?> <img src="../<?php echo $row["imagem_livro"]; ?>" height="100" width="100">  <?php 
=======
                                    echo "<td>"; ?> <img src="../librarian/<?php echo $row["books_image"]; ?>" height="100" width="100">  <?php 
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/livros.php
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."</b>";
                                    echo "<br>";
                                    echo "<b>". "Disponíveis: ".$row["available_qty"]."</b>";
                                    
                                    $qtdzero=$row["available_qty"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                        echo "<br>";
                                    echo "<b>"; ?> <a href="solicitar_emprestimo.php?id=<?php echo $row["id"]; ?>">SOLICITAR EMPRÉSTIMO</a> <?php echo "</b>";
                                    }      
                                    echo "</td>";
                                    
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }

                                }
                                echo "</tr>";
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
<<<<<<< HEAD:usuario/livros.php
include "../componentes_funcoes/footer.php";
=======
include "footer.php";
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/student/livros.php
?>

       