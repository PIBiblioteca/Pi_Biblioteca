<?php
session_start();
if(!isset($_SESSION["bibliotecario"]))
{
    ?>
    <script type="text/javascript">
        window.location="../usuario/login.php";

    </script>
    <?php
}
include "../bibliotecario/componentes_funcoes/header.php";
include "../bibliotecario/componentes_funcoes/connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Histórico de empréstimos</h3>
                    </div>

                    <?php include "../bibliotecario/componentes_funcoes/botao_pesquisar.php";?>
                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:750px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Lista de livros devolvidos</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                            // RESULTADO COM CAMPO DE BUSCA - NÃO FUNCIONANDO
                            if(isset($_POST["submit1"])) {
                                $res=mysqli_query($link, "SELECT * FROM emprestimos 
                                    WHERE books_name LIKE('%$_POST[t1]%')
                                    OR student_enrollment LIKE('%$_POST[t1]%')
                                	OR student_name LIKE('%$_POST[t1]%')
                                    OR student_contact LIKE('%$_POST[t1]%')
                                    OR student_email LIKE('%$_POST[t1]%')
                                    OR books_issue_date LIKE('%$_POST[t1]%')
                                    OR books_return_date LIKE('%$_POST[t1]%')
                                    OR status_emprestimo LIKE('%$_POST[t1]%') 
                                ");
                                    $contador=0; //contador para exibir resultado caso while não der retorno
                                    while($row3 = mysqli_fetch_array($res)){
                                    $contador=$contador+1;
                                    
                                    if ($contador == 1) { //contador para não exibir a tabela duas vezes quando a pesquisa dá mais de um resultado
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
                                                Contato
                                            </th>
                                            <th>
                                                E-mail
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
                                            while($row = mysqli_fetch_array($res)) {
                                                $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = 'DEVOLVIDO' ORDER BY id DESC");
                                                
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
                                                echo $row3["student_contact"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_email"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo (implode("/",array_reverse(explode("-",($row3["books_issue_date"]))))); // data no formato BR
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
                                        }
                                        }
                                        if ($contador==0){
                                            echo "'$_POST[t1]' não encontrado";
                                        }
                                
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
                                                Contato
                                            </th>
                                            <th>
                                                E-mail
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
                                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = 'DEVOLVIDO' ORDER BY id DESC");
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
                                                echo $row3["student_contact"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row3["student_email"];
                                                echo "</td>";
                                                echo "<td>";
                                                echo (implode("/",array_reverse(explode("-",($row3["books_issue_date"]))))); // data no formato BR
                                                echo "</td>";
                                                echo "<td>";
                                                echo (implode("/",array_reverse(explode("-",($row3["books_return_date"]))))); // data no formato BR
                                                
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
include "../bibliotecario/componentes_funcoes/footer.php";
?>

       