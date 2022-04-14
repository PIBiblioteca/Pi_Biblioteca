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
include "../student/componentes_funcoes/connection.php";
include "../student/componentes_funcoes/header.php";
include "../librarian/componentes_funcoes/contadores.php";
?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Meus empréstimos</h3>
                        <br>
                    </div>

                    <!-- menu pesquisa -->
                    
                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <?php
                        echo "Total de livros na biblioteca: $contador_livros_disponiveis <br>";
                        echo "Total de livros emprestados: $contador_livros_emprestados <br>";
                        
                        $count=0;
                        //verifica se há solicitação
                        $result2 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE student_email = '$email'");
                            if(mysqli_num_rows($result2) > 0) {
                                $count=$count+1;
                                ?>
                                <div class="x_title">
                                <h2>Minha solicitação</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id='container'>
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
                                            
                                            echo (implode("/",array_reverse(explode("-",($row["data_solicitacao"]))))); // data no formato BR

                                            //echo $row[date('Y-m-d', "data_solicitacao")];
                                            echo "</td>";
                                            echo "<td>";
                                            echo (implode("/",array_reverse(explode("-",($row["prazo_retirada"]))))); // data no formato BR
                                            echo "</td>";
                                            echo "<td>";
                                            echo $row["status_solicitacao"];
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<b>"; ?> <a href="cancelar_solicitacao.php?id_solicitacao=<?php echo $row["id_solicitacao"]; ?>">CANCELAR SOLICITAÇÃO</a> <?php echo "</b>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                ?>
                                </table>
                                    </div>
                                <?php
                            }
                       

                        //verifica se existe empréstimo
                        $status_emprestimo='';
                        $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email'");
                        while($row3 = mysqli_fetch_array($result3)){
                            $status_emprestimo=$row3["status_emprestimo"];
                        }

                        if($status_emprestimo=='À DEVOLVER') {
                            $count=$count+1;
                            ?>
                                <div class="x_title">
                                <h2>Livro a devolver</h2>
                                <div class="clearfix"></div>
                                </div>
                                <div id='container'>
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
                                    $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo = '$status_emprestimo' && student_email = '$email'");
                                    while($row3 = mysqli_fetch_array($result3)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row3["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo (implode("/",array_reverse(explode("-",($row3["books_issue_date"])))));
                                        echo "</td>";
                                        echo "<td>";
                                        echo (implode("/",array_reverse(explode("-",($row3["books_return_date"])))));
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
                                } else {
                                 $result3 = mysqli_query($link, "SELECT * FROM suspensoes WHERE student_email = '$email'");
                                 if(mysqli_num_rows($result3) > 0) {
                                    $count=$count+1;
                                    ?>
                                    <div class="x_title">
                                <h2>Suspensão</h2>
                                <div class="clearfix"></div>
                                </div>
                                
                                <div id='container'>
                                <table class="table table-bordered">
                                    
                                    <th>
                                        Nome do livro
                                    </th>
                                    <th>
                                        Data de suspensão
                                    </th>
                                    <th>
                                        Motivo
                                    </th>
                                    <th>
                                        Final da suspensão
                                    </th>
                                    <?php
                                    
                                    while($row3 = mysqli_fetch_array($result3)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row3["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo (implode("/",array_reverse(explode("-",($row3["suspension_date"]))))); // data no formato BR
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row3["suspension_reason"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo (implode("/",array_reverse(explode("-",($row3["suspension_return_date"]))))); // data no formato BR
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>   
                                    </table>
                                    </div>
                                    <?php
                                }
                            }
                            //mostra recado se não houver registro nas tabelas
                            if ($count==0) {
                                ?>
                                <div class="x_title">
                                        <h2>Solicitações</h2>
                                    <div class="clearfix"></div>
                                    </div>
                                <div id='container'>
                                    <table class="table table-bordered">
                                    
                                    <th>NÃO HÁ REGISTROS <br></th> 
                                    <tr>
                                    <td> <a href="livros.php"> Clique aqui </a> para solicitar o empréstimo de um livro ou acesse 'Buscar Livros' no menu </td>
                                    </tr>
                                    </table>
                                </div>
                                <?php 
                            
                                echo "<br>";
                            } 
                            
                            //verifica se há histórico
                            $status_emprestimo='';
                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email' && status_emprestimo = 'DEVOLVIDO'");
                            while($row3 = mysqli_fetch_array($result3)){
                                $status_emprestimo=$row3["status_emprestimo"];
                            }
                                if($status_emprestimo=='DEVOLVIDO') {
                                    ?>
                                        <div class="x_title">
                                        <h2>Histórico</h2>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div id='container'>
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
                                            $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email' && status_emprestimo = 'DEVOLVIDO'");
                                            while($row3 = mysqli_fetch_array($result3)){
                                                echo "<tr>";
                                                echo "<td>";
                                                echo $row3["books_name"];
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

        