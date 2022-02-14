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
include "connection.php"
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Lista de retiradas</h3>
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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              
                            <?php 

                            if(isset($_POST["submit1"])) {
                                $res=mysqli_query($link, "SELECT * FROM suspensions WHERE student_enrollment LIKE('%$_POST[t1]%') OR books_name LIKE('%$_POST[t1]%')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "student enrollment"; echo "</th>";
                                echo "<th>"; echo "student contact"; echo "</th>";
                                echo "<th>"; echo "student email"; echo "</th>";
                                echo "<th>"; echo "books name"; echo "</th>";
                                echo "<th>"; echo "suspension date"; echo "</th>";
                                echo "<th>"; echo "suspension reason"; echo "</th>";
                                echo "<th>"; echo "suspension return date"; echo "</th>";
                                echo "<th>"; echo "remove suspension"; echo "</th>";
                                echo "</tr>";
                                while($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                    echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                    echo "<td>"; echo $row["student_email"]; echo "</td>";
                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                    echo "<td>"; echo $row["suspension_date"]; echo "</td>";
                                    echo "<td>"; echo $row["suspension_reason"]; echo "</td>";
                                    echo "<td>"; echo $row["suspension_return_date"]; echo "</td>";
                                    echo "<td>"; ?> <a href="remove_suspension.php?id=<?php echo $row["id"]; ?>">Reposição efetuada</a> <?php echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            else
                            { 

                            $res=mysqli_query($link, "SELECT * FROM retiradas");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "student enrollment"; echo "</th>";
                                echo "<th>"; echo "books name"; echo "</th>";
                                echo "<th>"; echo "student name"; echo "</th>";
                                echo "<th>"; echo "student contact"; echo "</th>";
                                echo "<th>"; echo "student email"; echo "</th>";
                                echo "<th>"; echo "livro retirado?"; echo "</th>";
                                echo "</tr>";
                            while($row = mysqli_fetch_array($res)) {
                                $prazo_retirada=$row["prazo_retirada"];
                                $id = $row["id"];
                                $status_solicitacao = $row["status_solicitacao"];

                                if($row["status_solicitacao"]=="AGUARDANDO RETIRADA") {
                                echo "<tr>";
                                echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                                echo "<td>"; echo $row["books_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_name"]; echo "</td>";
                                echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                echo "<td>"; echo $row["student_email"]; echo "</td>";
                                echo "<td>"; 
                               
                                $date=date('d/m/Y');
                                //VERIFICA SE LIVRO ESTÁ ATRASADO E CANCELA SOLICITAÇÂO
                                if($status_solicitacao=="AGUARDANDO RETIRADA") { //testar se esse if funciona
                                    if($date > $prazo_retirada){
                                        mysqli_query($link, "UPDATE retiradas SET status_solicitacao='LIVRO NÃO RETIRADO NO PRAZO' WHERE id='$id'");

                                        $res5=mysqli_query($link, "SELECT * FROM retiradas WHERE id='$id'");
                                        while($row5=mysqli_fetch_array($res5)){
                                            $booksname=$row5["books_name"];
                                        }

                                        mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$booksname'"); //função aumentar quantidade disponível
                                    }
                                }
                               ?>

                               <a class="color: green" href="retirado.php?id=<?php echo $row["id"]; ?>">SIM</a>
                               
                                <?php 
                                echo "</td>";
                                echo "</tr>";
                                }
                            }
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

       