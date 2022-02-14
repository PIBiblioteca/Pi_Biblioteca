<?php
session_start();
if(!isset($_SESSION["username"]))
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
                          $id=($_GET["id"]);  //puxar id do livro escolhido                          

                                $date=date("d/m/Y");
                                // SELECIONAR DADOS DO ESTUDANTE
                                $res5=mysqli_query($link, "SELECT * FROM student_registration WHERE username='$_SESSION[username]'");
                                while($row5=mysqli_fetch_array($res5))
                                {
                                    $firstname=$row5["firstname"];
                                    $lastname=$row5["lastname"];
                                    $username=$row5["username"];
                                    $email=$row5["email"];
                                    $contact=$row5["contact"];
                                    $sem=$row5["sem"];
                                    $enrollment=$row5["enrollment"];
                                    $status=$row5["status"];
                                    $_SESSION["enrollment"]=$enrollment;
                                    $_SESSION["susername"]=$username;
                                }
                                
                                //VERIFICAR VIABILIDADE DE EMPRÉSTIMO
                                //verifica se usuário está suspenso
                                $result2 = mysqli_query($link, "SELECT * FROM suspensions WHERE student_enrollment = $enrollment");

                                if($status=='SUSPENSO') {
                                    ?>
                                    <script type="text/javascript">
                                        alert("USUÁRIO SUSPENSO");
                                        window.location="livros.php";
                                    </script>
                                    <?php
                                }
                                else {
                                    if(mysqli_num_rows($result2) > 0) {
                                        ?>
                                        <script type="text/javascript">
                                            alert("USUÁRIO NA LISTA DE SUSPENSÕES");
                                            window.location="livros.php";
                                        </script>
                                        <?php
                                    }
                                }

                                //verifica se usuário tem empréstimo
                                $result3 = mysqli_query($link, "SELECT * FROM issue_books WHERE student_enrollment = $enrollment");
                                if(mysqli_num_rows($result3) > 0) {
                                    ?>
                                    <script type="text/javascript">
                                        alert("USUÁRIO JÁ POSSUI EMPRÉSTIMO");
                                        window.location="livros.php";
                                    </script>
                                    <?php
                                } 

                                $result4 = mysqli_query($link, "SELECT * FROM retiradas WHERE student_enrollment = $enrollment");
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
                                
                                // SELECIONAR DADOS DO LIVRO
                                $qty=0;
                                $res6=mysqli_query($link, "SELECT * FROM add_books WHERE id=$id");
                                while ($row6 = mysqli_fetch_array($res6))
                                {           
                                    $booksname=$row6["books_name"];  
                                    $qty=$row6["available_qty"];
                                }   
                                
                                $issuedate=date("d/m/Y");
                                $returndate=date('d/m/Y', strtotime("+2 weeks"));
                                ?>

                                
                                <table class="table table-bordered">
                                <tr>
                                    <td>booksname
                                        <input type="text" class="form-control" placeholder="booksname" name="booksname" value="<?php echo $booksname; ?>" disabled>
                                           
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td> Enrollment
                                        <input type="text" class="form-control" placeholder="enrollmentno" name="enrollment" value="<?php echo $enrollment; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> studentname
                                        <input type="text" class="form-control" placeholder="studentname" name="studentname" value="<?php echo $firstname.' '.$lastname; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> studentsem
                                        <input type="text" class="form-control" placeholder="studentsem" name="studentsem" value="<?php echo $sem; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td> studentcontact
                                        <input type="text" class="form-control" placeholder="studentcontact" name="studentcontact" value="<?php echo $contact; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>studentemail
                                        <input type="text" class="form-control" placeholder="studentemail" name="studentemail" value="<?php echo $email; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>booksissuedate
                                        <input type="text" class="form-control" placeholder="booksissuedate" name="booksissuedate" value="<?php echo date("d/m/Y"); ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>booksreturndate
                                        <input type="text" class="form-control" placeholder="booksreturndate" name="booksreturndate" value="<?php echo date('d/m/Y', strtotime("+2 weeks")); ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                     <td>studentusername
                                        <input type="text" class="form-control" placeholder="studentusername" name="studentusername" value="<?php echo $username; ?>" disabled>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Cancelar" 
                                        name="submit1" class="form-control btn btn-default" style="background-color: brown; color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="issue books" 
                                        name="submit2" class="form-control btn btn-default" style="background-color: blue; color: white">
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
                                //verificar disponibilidade
                                if($qty==0)
                                {
                                    ?>
                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <strong>this book is not available in stock</strong> 
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    $prazo_retirada=date('d/m/Y', strtotime("+1 weeks"));
                                    mysqli_query($link, "INSERT INTO retiradas VALUES('','$booksname','$_SESSION[enrollment]','$firstname $lastname','$contact','$email','$date','$prazo_retirada','AGUARDANDO RETIRADA')");
                                    mysqli_query($link, "UPDATE add_books SET available_qty=available_qty-1 WHERE id=$id"); //função diminuir quantidade disponível
                                    ?>
                                    <script type="text/javascript">
                                        alert("Solicitação concluída, comparecer à biblioteca em até 7 dias para retirada");
                                        window.location.href="livros.php";
                                    </script>
                                    
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

       