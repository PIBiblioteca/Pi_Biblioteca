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
include "..\bibliotecaria\componentes_funcoes\header.php";
include "..\bibliotecaria\componentes_funcoes\connection.php"
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Lista de retiradas</h3>
                    </div>
                    
                    <?php include "..\bibliotecaria\componentes_funcoes\botao_pesquisar.php";?>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:750px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Livros aguardando retirada</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              
                            <?php 
                            //função pesquisar
                            if(isset($_POST["submit1"])) {
                                $res=mysqli_query($link, "SELECT * FROM solicitacoes 
                                WHERE student_enrollment LIKE('%$_POST[t1]%') 
                                    OR books_name LIKE('%$_POST[t1]%')
                                	OR student_name LIKE('%$_POST[t1]%')
                                    OR student_contact LIKE('%$_POST[t1]%')
                                    OR student_email LIKE('%$_POST[t1]%')
                                ");
                                $contador=0;
                                while($row = mysqli_fetch_array($res)) {
                                $contador=$contador+1;
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Matrícula usuário"; echo "</th>";
                                echo "<th>"; echo "Nome do livro"; echo "</th>";
                                echo "<th>"; echo "Nome usuário"; echo "</th>";
                                echo "<th>"; echo "Contato usuário"; echo "</th>";
                                echo "<th>"; echo "E-mail usuário"; echo "</th>";
                                echo "<th>"; echo "livro retirado?"; echo "</th>";
                                echo "</tr>";
                            
                                $prazo_retirada=$row["prazo_retirada"];
                                $id_solicitacao = $row["id_solicitacao"];
                                $status_solicitacao = $row["status_solicitacao"];

                                if($row["status_solicitacao"]=="AGUARDANDO RETIRADA") {
                                echo "<tr>";
                                echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                echo "<td>"; echo $row["books_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                echo "<td>"; echo $row["student_email"]; echo "</td>";
                                echo "<td>"; 
                               
                                $date=date('Y-m-d');
                                //VERIFICA SE LIVRO ESTÁ ATRASADO E CANCELA SOLICITAÇÂO
                                if($status_solicitacao=="AGUARDANDO RETIRADA") { 
                                    if(strtotime($date) > strtotime($prazo_retirada)){
                                        mysqli_query($link, "UPDATE solicitacoes SET status_solicitacao='LIVRO NÃO RETIRADO NO PRAZO' WHERE id_solicitacao='$id_solicitacao'");

                                        $res5=mysqli_query($link, "SELECT * FROM solicitacoes WHERE id_solicitacao='$id_solicitacao'");
                                        while($row5=mysqli_fetch_array($res5)){
                                            $booksname=$row5["books_name"];
                                        }

                                        mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$booksname'"); //função aumentar quantidade disponível
                                    }
                                }
                               ?>

                               <a class="color: green" href="retirado.php?id_solicitacao=<?php echo $row["id_solicitacao"]; ?>">SIM</a>
                               
                                <?php 
                                echo "</td>";
                                echo "</tr>";
                                }
                            }
                            echo "</table>";
                            echo "</div>";
                            if ($contador==0){
                                echo "'$_POST[t1]' não encontrado";
                            }
                            }
                            else
                            { 
                            //exibe tabela sem pesquisa
                            $res=mysqli_query($link, "SELECT * FROM solicitacoes");
                            // retorno quando não há registros
                            if(mysqli_num_rows($res) == 0) {
                                ECHO "Não há registros no momento   ";
                            }
                            //retorno quando há registros
                            else {
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Matrícula usuário"; echo "</th>";
                                echo "<th>"; echo "Nome do livro"; echo "</th>";
                                echo "<th>"; echo "Nome usuário"; echo "</th>";
                                echo "<th>"; echo "Contato usuário"; echo "</th>";
                                echo "<th>"; echo "E-mail usuário"; echo "</th>";
                                echo "<th>"; echo "livro retirado?"; echo "</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_array($res)) {
                                $prazo_retirada=$row["prazo_retirada"];
                                $id_solicitacao = $row["id_solicitacao"];
                                $status_solicitacao = $row["status_solicitacao"];

                                if($row["status_solicitacao"]=="AGUARDANDO RETIRADA") {
                                echo "<tr>";
                                echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                echo "<td>"; echo $row["books_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                echo "<td>"; echo $row["student_email"]; echo "</td>";
                                echo "<td>"; 
                               
                                $date=date('Y-m-d');
                                //VERIFICA SE RETIRADA ESTÁ ATRASADA E CANCELA SOLICITAÇÂO
                                if($status_solicitacao=="AGUARDANDO RETIRADA") { 
                                    if(strtotime($date) > strtotime($prazo_retirada)){
                                        mysqli_query($link, "UPDATE solicitacoes SET status_solicitacao='LIVRO NÃO RETIRADO NO PRAZO' WHERE id_solicitacao='$id_solicitacao'");

                                        $res5=mysqli_query($link, "SELECT * FROM solicitacoes WHERE id_solicitacao='$id_solicitacao'");
                                        while($row5=mysqli_fetch_array($res5)){
                                            $booksname=$row5["books_name"];
                                        }

                                        mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$booksname'"); //função aumentar quantidade disponível
                                    }
                                }
                               ?>

                               <a class="color: green" style="padding: 5px 10px; color: white; background-color: green; border: none; border-radius: 5px; box-shadow: none; margin: 0; " href="../bibliotecaria/componentes_funcoes/retirado.php?id_solicitacao=<?php echo $row["id_solicitacao"]; ?>">SIM</a>
                               
                                <?php 
                                echo "</td>";
                                echo "</tr>";
                                }
                            }
                            echo "</table>";
                            echo "</div>";
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
include "../bibliotecaria/componentes_funcoes/footer.php";
?>

       