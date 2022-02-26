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
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Histórico de empréstimos</h3>
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
                                <h2>Lista de livros devolvidos</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                            // RESULTADO COM CAMPO DE BUSCA
                            if(isset($_POST["submit1"])) {
                                $res=mysqli_query($link, "SELECT * FROM emprestimos WHERE books_name LIKE('%$_POST[t1]%')");
                                
                                    ?>
                                    <div id='container'>
                                        <table class="table table-bordered">
                                            
                                            <th>
                                                Nome do livro
                                            </th>
                                            <th>
                                                Matrícula aluno
                                            </th>
                                            <th>
                                                Nome aluno
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
                                            
                                            while($row3 = mysqli_fetch_array($res)){

                                                
                                                $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = 'DEVOLVIDO'");
                                                
                                                if($row3["status_emprestimo"]=='DEVOLVIDO') {
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $row3["books_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_enrollment"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_name"];
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
                                            } 
                                        ?>   
                                        </table>
                                    </div>
                                        <?php
                                        

                                
                            } else {

                            // RESULTADO *SEM* O CAMPO DE BUSCA
                            //verifica se há histórico
                            $status_emprestimo='';
                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = 'DEVOLVIDO'");
                            while($row3 = mysqli_fetch_array($result3)){
                                $status_emprestimo=$row3["status_emprestimo"];
                            }
                                if($status_emprestimo=='DEVOLVIDO') {
                                    ?>
                                        <div id='container'>
                                        <table class="table table-bordered">
                                            
                                        <th>
                                                Nome do livro
                                            </th>
                                            <th>
                                                Matrícula aluno
                                            </th>
                                            <th>
                                                Nome aluno
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
                                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = 'DEVOLVIDO'");
                                            while($row3 = mysqli_fetch_array($result3)){
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $row3["books_name"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_enrollment"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_name"];
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
                                        </div>
                                        <?php
                                        } 
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

       