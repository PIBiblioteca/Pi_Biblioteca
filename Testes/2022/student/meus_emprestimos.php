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
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Meus empréstimos</h3>
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
                        <?php
                        //verifica se há solicitação
                        $result2 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE student_email = '$email'");
                            if(mysqli_num_rows($result2) > 0) {
                                ?>
                                <div class="x_title">
                                <h2>Minha solicitação</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <th>
                                        Nome do livro
                                    </th>
                                    <th>
                                        Data Solicitação
                                    </th>
                                    <th>
                                        Prazo Retirada
                                    </th>
                                    <th>
                                        Status Solicitação 
                                    </th>
                                     <th>
                                        Cancelar Solicitação 
                                    </th>
                                    <?php
                                        while($row=mysqli_fetch_array($result2))
                                        {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $row["books_name"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["data_solicitacao"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["prazo_retirada"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["status_solicitacao"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<b>"; ?> <a href="cancelar_solicitacao.php?id=<?php echo $row["id"]; ?>">CANCELAR SOLICITAÇÃO</a> <?php echo "</b>";
                                            echo "</td>";

                                            

                                            echo "</tr>";
                                        }
                                ?>
                                </table>
                                <?php
                            }
                        ?>
                        <?php
                        //verifica se existe empréstimo
                        $status_emprestimo='';
                        $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email'");
                        while($row3 = mysqli_fetch_array($result3)){
                            $status_emprestimo=$row3["status_emprestimo"];
                        }

                        if($status_emprestimo=='À DEVOLVER') {
                            ?>
                                <div class="x_title">
                                <h2>Livro a devolver</h2>
                                <div class="clearfix"></div>
                                </div>
                                <table class="table table-bordered">
                                    
                                    <th>
                                        Nome do livro
                                    </th>
                                    <th>
                                        Data Retirada
                                    </th>
                                    <th>
                                        Prazo Devolução
                                    </th>
                                    <th>
                                        Status Empréstimo 
                                    </th>
                                    <?php
                                    $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = '$status_emprestimo'");
                                    while($row3 = mysqli_fetch_array($result3)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row3["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row3["books_issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row3["books_return_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row3["status_emprestimo"];
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>   
                                </table>
                                <?php
                                }
                                
                                if($status_emprestimo=='DEVOLVIDO') {
                                    ?>
                                        <div class="x_title">
                                        <h2>Histórico</h2>
                                        <div class="clearfix"></div>
                                        </div>
                                        <table class="table table-bordered">
                                            
                                            <th>
                                                Nome do livro
                                            </th>
                                            <th>
                                                Data Retirada
                                            </th>
                                            <th>
                                                Prazo Devolução
                                            </th>
                                            <th>
                                                Status Empréstimo 
                                            </th>
                                            <?php
                                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email'");
                                            while($row3 = mysqli_fetch_array($result3)){
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $row3["books_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["books_issue_date"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["books_return_date"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["status_emprestimo"];
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>   
                                        </table>
                                        <?php
                                        }
                                        //if($status_emprestimo==''){
                                          //  echo "NÃO HÁ REGISTROS <br> <br>Faça o seu primeiro empréstimo no menu 'Buscar Livros' ";
                                        //}
                                
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

        