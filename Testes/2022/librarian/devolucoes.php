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
                        <h3>Devoluções</h3>
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
                                <h2>Livros à serem devolvidos</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php
                                $status_emprestimo='DEVOLVIDO';
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
                                        echo "<td>"; echo $books_issue_date; echo "</td>";
                                        echo "<td>"; echo $books_return_date; echo "</td>";
                                        echo "<td>"; 
                                        //puxa status_usuário da tablea "cadastro_usuarios"
                                        $res1 = mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$student_email'");
                                        while ($row1 = mysqli_fetch_array($res1)) {
                                            $status_usuario=$row1["status_usuario"];
                                        }
                                        echo $status_usuario;
                                         echo "</td>";
                                        echo "<td>"; 
                                        //VERIFICAR SE DEVOLUÇÃO ESTÁ EM ATRASO
                                        $date=date ('d/m/Y');
                                                                              
                                        if (strtotime($date) < strtotime($return_date)) {
                                            
                                            $result2 = mysqli_query($link, "SELECT * FROM suspensoes WHERE student_email = '$student_email'");
                                            $teste=1;
                                            if((mysqli_num_rows($result2) > 0) AND ($status_emprestimo=='ATRASADO')) {
                                                echo "ATRASADO";
                                            }
                                            else {
                                            //suspende usuário na tabela cadastro_usuarios
                                            mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='SUSPENSO' WHERE email='$student_email'");
                                            
                                            //envia usuário para tabela suspensoes
                                            mysqli_query($link, "INSERT INTO suspensoes VALUES('', '$student_enrollment', '$student_contact', '$student_email', '$books_name', '', 'atraso na devolução', '')");
                                            }
                                        }
                                        if($status_emprestimo=='PERDA/AVARIA'){
                                            echo "PERDIDO/AVARIADO";
                                            ?> <a style="color: green" href="repor_livro.php?id=<?php echo $id; ?>">REPOSIÇÃO</a> <?php 
                                        } else {
                                        //MOSTRA BOTÃO "CONFIRMAR"
                                        ?> <a style="color: green" href="devolver_livro.php?id=<?php echo $id; ?>">CONFIRMAR</a> <?php 
                                        }
                                        
                                        if($status_emprestimo=='PERDA/AVARIA'){
                                            
                                        } else {
                                        ?> <a style="color: brown" href="perda_avaria.php?id=<?php echo $id; ?>">PERDA/AVARIA</a> <?php 
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    
                                    echo "</table>";
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

       