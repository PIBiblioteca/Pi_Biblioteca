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
<<<<<<< HEAD:bibliotecaria/devolucoes.php
include "../componentes_funcoes/connection.php";
include "../componentes_funcoes/header.php";
=======
include "connection.php";
include "header.php";
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/librarian/devolucoes.php
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Devoluções</h3>
                    </div>

                    <!-- menu pesquisa -->
                    <form name="form1" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5x col-xs-12 form-group pull-right top_search">
                                <div class="input-group">

                                        <input type="text" name="t1" class="form-control" placeholder="Não funcionando ainda">
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
                                <h2>Livros à serem devolvidos</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php
                                $status_emprestimo='DEVOLVIDO';
                                    //puxa dados da tabela "emprestimos"
                                    $res = mysqli_query($link, "SELECT * FROM emprestimos");
                                    while($row = mysqli_fetch_array($res)) {
                                        $id=$row["id"];
                                        $student_enrollment=$row["student_enrollment"];
                                        $return_date=$row["books_return_date"];
                                        $student_contact = $row["student_contact"];
                                        $student_email = $row["student_email"];
                                        $books_name = $row["books_name"];
                                        $status_emprestimo = $row["status_emprestimo"];
                                        $student_name = $row["student_name"];
                                        $books_issue_date = $row["books_issue_date"];
                                        $books_return_date = $row["books_return_date"];
                                    }
                                    //retorno se não houver livros a serem devolvidos
                                    if($status_emprestimo=='DEVOLVIDO') {
                                        ECHO "Não há registros no momento";
                                    }
                                    //retorno se houver livros a serem devolvidos
                                    else {

                                    //CRIAR FUNÇÃO PESQUISAR    
                                    echo "<div id='container'>";
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>"; echo "Matrícula usuário"; echo "</th>";
                                        echo "<th>"; echo "Nome usuário"; echo "</th>";
                                        echo "<th>"; echo "Contato usuário"; echo "</th>";
                                        echo "<th>"; echo "E-mail usuário"; echo "</th>";
                                        echo "<th>"; echo "Nome do livro"; echo "</th>";
                                        echo "<th>"; echo "Data de empréstimo"; echo "</th>";
                                        echo "<th>"; echo "Data de retorno"; echo "</th>";
                                        echo "<th>"; echo "Status usuário"; echo "</th>";
                                        echo "<th>"; echo "Devolução"; echo "</th>";
                                        
                                        echo "</tr>";
                                        
                                            echo "<tr>";
                                            echo "<td>"; echo $student_enrollment; echo "</td>";
                                            echo "<td>"; echo $student_name; echo "</td>";
                                            echo "<td>"; echo $student_contact; echo "</td>";
                                            echo "<td>"; echo $student_email; echo "</td>";
                                            echo "<td>"; echo $books_name; echo "</td>";
                                            echo "<td>"; 
                                            echo (implode("/",array_reverse(explode("-",($books_issue_date))))); // data no formato BR
                                            echo "</td>";
                                            echo "<td>"; 
                                            echo (implode("/",array_reverse(explode("-",($books_return_date))))); // data no formato BR
                                            echo "</td>";
                                            echo "<td>"; 
                                            //puxa status_usuário da tablea "cadastro_usuarios" para coluna "status usuario"
                                            $res1 = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$student_email'");
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                $status_usuario=$row1["status_usuario"];
                                            }
                                            echo $status_usuario;
                                            echo "</td>";

                                            //coluna "devoluções"
                                            echo "<td>"; 
                                            $date=date('Y-m-d');

                                            //VERIFICAR SE DEVOLUÇÃO ESTÁ EM ATRASO                                                        
                                            if ($date > $books_return_date) { //se a data atual for menor q a data de devolução:
                                                $teste=1;
                                                
                                                
                                                
                                                $result2 = mysqli_query($link, "SELECT * FROM suspensoes WHERE student_email = '$student_email'");
                                                $teste=1;
                                                
                                                if ($status_emprestimo=='ATRASADO') {
                                                    echo "ATRASADO <br>";
                                                }
                                                if((mysqli_num_rows($result2) == 0)) { //verifica se já está suspenso   
                                                    //suspende usuário na tabela cadastro_usuarios
                                                    mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='SUSPENSO' WHERE email='$student_email'");

                                                    mysqli_query($link, "UPDATE emprestimos SET status_emprestimo='ATRASADO' WHERE id='$id'");
                                                        
                                                    //envia usuário para tabela suspensoes
                                                    mysqli_query($link, "INSERT INTO suspensoes VALUES('', '$student_enrollment', '$student_contact', '$student_email', '$books_name', 'ainda não devolvido', 'atraso na devolução', 'ainda não devolvido')");
                                                    $status_emprestimo="ATRASADO";
                                                    echo "teste2 <br>";
                                                    echo "$status_emprestimo <br>";
                                                    }
                                                }
                                            

                                            //VERIFICA SE LIVRO ESTÁ PERDIDO OU AVARIADO
                                            if($status_emprestimo=='PERDA/AVARIA'){
                                                echo "PERDIDO/AVARIADO";
                                                //MOSTRA BOTÃO "REPOSIÇÃO"
                                                ?> <a style="color: green" href="repor_livro.php?id=<?php echo $id; ?>">REPOSIÇÃO</a> <?php 
                                            } else {
                                            //MOSTRA BOTÃO "CONFIRMAR(devolução)"
                                            ?> <a style="color: green" href="devolver_livro.php?id=<?php echo $id; ?>">CONFIRMAR</a> <?php 
                                            }
                                            //VERIFICA SE LIVRO ESTÁ PERDIDO OU AVARIADO
                                            if($status_emprestimo=='PERDA/AVARIA'){
                                                
                                            } else {
                                            //MOSTRA BOTÃO "PERDA/AVARIA"
                                            ?> <a style="color: brown" href="perda_avaria.php?id=<?php echo $id; ?>">PERDA/AVARIA</a> <?php 
                                            }
                                            echo "</td>";
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
<<<<<<< HEAD:bibliotecaria/devolucoes.php
include "../componentes_funcoes/footer.php";
=======
include "footer.php";
>>>>>>> parent of 813f659 (Tela "sig_biblioteca" criada; BD de livros oficial importado; Pastas do sistema organizadas.):Testes/2022/librarian/devolucoes.php
?>