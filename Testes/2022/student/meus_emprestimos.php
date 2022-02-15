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
                            <div class="x_title">
                                <h2>Minha solicitação</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <th>
                                        Books Name
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
                                    <?php
                                    //VERIFICA SE USUÁRIO ESTÁ NA LISTA SOLICITAÇÕES OU EMPRÉSTIMOS
                                    $email=$_SESSION["email"];
                                    $result3 = mysqli_query($link, "SELECT * FROM retiradas WHERE student_email='$email'");
                                        while($row=mysqli_fetch_array($result3))
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
                                            echo "</tr>";
                                        }
                                ?>
                                    
                                </table>
                                <div class="x_title">
                                <h2>Meu histórico</h2>
                                <div class="clearfix"></div>
                                </div>
                                <table class="table table-bordered">
                                    
                                    <th>
                                        Books Name
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

                                    $res=mysqli_query($link, "SELECT * FROM emprestimos WHERE student_enrollment='$_SESSION[enrollment]'");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_return_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo "devolução até "; 
                                        echo $row["books_return_date"];
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                
                                    ?>
                                    
                                </table>
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

        