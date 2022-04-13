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
include "../librarian/componentes_funcoes/header.php";
include "../librarian/componentes_funcoes/connection.php";
include "/xampp/htdocs/GitHub/Pi_Biblioteca/Testes/2022/librarian/regras_biblioteca.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Solicitar empréstimo</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <form name="form1" action="" method="post">

                            <?php
                                //SELEÇÃO DE DADOS E ATRIBUIÇÃO DE VARIÁVEIS
                                $id=($_GET["id"]);  //puxar id do livro escolhido                          

                                $date=date("mm-dd-yyyy");
                                // puxa dados do usuário
                                $email=$_SESSION["email"];
                                $res5=mysqli_query($link, "SELECT * FROM cadastro_usuarios WHERE email='$email'");
                                while($row5=mysqli_fetch_array($res5))
                                {
                                    $fullname=$row5["fullname"];
                                    $enrollment=$row5["enrollment"];
                                    $contact=$row5["contact"];
                                    $enrollment=$row5["enrollment"];
                                    $status=$row5["status_usuario"];
                                    $_SESSION["email"]=$email;
                                }
                                
                                //VERIFICAR VIABILIDADE DE EMPRÉSTIMO
                                //verifica se usuário está suspenso
                                $result2 = mysqli_query($link, "SELECT * FROM suspensoes WHERE student_email='$email'");

                                if(mysqli_num_rows($result2) > 0) {
                                    ?>
                                    <script type="text/javascript">
                                        alert("USUÁRIO NA LISTA DE SUSPENSÕES");
                                        window.location="livros.php";
                                    </script>
                                    <?php
                                }

                                //verifica se usuário tem empréstimo
                                $result3 = mysqli_query($link, "SELECT * FROM emprestimos WHERE student_email = '$email'");
                                while($row=mysqli_fetch_array($result3)){
                                    $status_emprestimo=$row["status_emprestimo"];
                                }
                                if(mysqli_num_rows($result3) > 0 && $status_emprestimo!="DEVOLVIDO") {
                                    ?>
                                    <script type="text/javascript">
                                        alert("USUÁRIO JÁ POSSUI EMPRÉSTIMO");
                                        window.location="livros.php";
                                    </script>
                                    <?php
                                } 
                                //verifica se existe solicitação
                                

                                $result6 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE student_email = '$email'");
                                    
                                //verifica se já existe dados na tabela
                                if(mysqli_num_rows($result6) > 0) {
                                    $result4 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE student_email = '$email'");
                                    while($row8=mysqli_fetch_array($result4))
                                    {
                                        $status_solicitacao=$row8["status_solicitacao"];
                                    }
                                    if($status_solicitacao=='AGUARDANDO RETIRADA') {
                                        ?>
                                        <script type="text/javascript">
                                            alert("JÁ EXISTE UMA SOLICITAÇÃO EM ANDAMENTO, SÓ UMA SOLICITAÇÃO POR USUÁRIO É PERMITIDA POR VEZ");
                                            window.location="livros.php";
                                        </script>
                                        <?php
                                    }
                                }
                                // SELECIONAR DADOS DO LIVRO
                                $qty=0;
                                $res6=mysqli_query($link, "SELECT * FROM adicionar_livros WHERE id=$id");
                                while ($row6 = mysqli_fetch_array($res6))
                                {           
                                    $booksname=$row6["books_name"];  
                                    $qty=$row6["available_qty"];
                                }   
                                
                                $issuedate=date("Y-m-d");
                                $returndate=date('Y-m-d', strtotime("+4 weeks")); //CORRIGIR PARA +2 WEEKS
                                
                                ?>
                                

                                
                                <table class="table table-bordered">
                                <tr>
                                    <td>Nome do livro
                                        <input type="text" class="form-control" placeholder="booksname" name="booksname" value="<?php echo $booksname; ?>" disabled>
                                           
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td> Matrícula usuário
                                        <input type="text" class="form-control" placeholder="enrollmentno" name="enrollment" value="<?php echo $enrollment; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> Nome usuário
                                        <input type="text" class="form-control" placeholder="fullname" name="fullname" value="<?php echo $fullname; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> Contato usuário
                                        <input type="text" class="form-control" placeholder="studentcontact" name="studentcontact" value="<?php echo $contact; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> E-mail usuário
                                        <input type="text" class="form-control" placeholder="studentemail" name="studentemail" value="<?php echo $email; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> Data da solicitação
                                        <input type="text" class="form-control" placeholder="booksissuedate" name="booksissuedate" value="<?php echo (implode("/",array_reverse(explode("-",$issuedate))));  ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Solicitar Empréstimo" 
                                        name="submit2" class="form-control btn btn-default" style="background-color: green; color: white">
                                    
                                        <input type="submit" value="Cancelar" 
                                        name="submit1" class="form-control btn btn-default" style="background-color: brown; color: white">
                                    </td>
                                </tr>
                                </table>
                            </form>

                            <?php
                            //função do botão cancelar
                            if(isset($_POST["submit1"]))
                            {
                                ?>
                            <script type="text/javascript">
                                window.location="livros.php";
                            </script>
                            
                            <?php
                            }
                            //função do botão solicitar
                            if(isset($_POST["submit2"]))
                            {
                                //verifica disponibilidade
                                if($qty==0)
                                {
                                    ?>
                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <strong>Este livro não está mais disponível</strong> 
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    $prazo_retirada=date('Y-m-d', strtotime("+5 days"));

                                    $result5 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE student_email = '$email'");
                                    
                                    //verifica se já existe solicitação concluída e a altera
                                    if(mysqli_num_rows($result5) > 0) {
                                        mysqli_query($link, "UPDATE solicitacoes SET books_name='$booksname', student_enrollment='$_SESSION[enrollment]', student_name='$fullname', 
                                        student_contact='$contact', 
                                        student_email='$email', 
                                        data_solicitacao='$issuedate', prazo_retirada='$prazo_retirada', status_solicitacao='AGUARDANDO RETIRADA'");
                                        mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty-1 WHERE id=$id"); //função diminuir quantidade disponível
                                    } else {
                                    //se não houver solicitação, cria uma
                                    mysqli_query($link, "INSERT INTO solicitacoes VALUES('','$booksname','$enrollment','$fullname','$contact','$email','$issuedate','$prazo_retirada','AGUARDANDO RETIRADA')");
                                    mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty-1 WHERE id=$id"); //função diminuir quantidade disponível
                                    ?>
                                    <script type="text/javascript">
                                        alert("Solicitação concluída, comparecer à biblioteca em até <?php echo $prazo_retirada_livro; ?> dias para retirada");
                                        window.location.href="meus_emprestimos.php";
                                    </script>
                                    
                                    <?php
                                    }
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
include "../librarian/componentes_funcoes/footer.php";
?>

       