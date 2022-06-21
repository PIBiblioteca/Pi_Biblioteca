<?php
session_start();
if(!isset($_SESSION["bibliotecario"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";

    </script>
    <?php
}
include "../bibliotecario/componentes_funcoes/connection.php";
include "../bibliotecario/componentes_funcoes/header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Usuários suspensos</h3>
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
                                <h2>Suspensões de usuários</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
                                <?php 

                                if(isset($_POST["submit1"])) {
                                    $res=mysqli_query($link, "SELECT * FROM suspensoes WHERE student_enrollment LIKE('%$_POST[t1]%') OR books_name LIKE('%$_POST[t1]%')");
                                // retorno quando não há registros
                                if(mysqli_num_rows($res) == 0) {
                                    ECHO "Não há registros no momento   ";
                                }
                                //retorno quando há registros
                                else {
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
                                        echo "<td>"; 
                                        ?> <a href="remover_suspensao.php?id=<?php echo $row["id"]; ?>">Reposição efetuada</a> <?php 
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                }
                                }
                                else
                                { 

                                $res=mysqli_query($link, "SELECT * FROM suspensoes");
                                // retorno quando não há registros
                                if(mysqli_num_rows($res) == 0) {
                                    ECHO "Não há registros no momento   ";
                                }
                                //retorno quando há registros
                                else {
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
                                    echo "<td>"; 
                                    if($row["suspension_reason"]=='perda/avaria') {?>
                                        <a style="color: green" href="remover_suspensao.php?id=<?php echo $row["id"]; ?>">Reposição</a> <?php } 
                                    echo "</td>";
                                
                                    echo "</tr>";
                                }
                                echo "</table>";
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

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../js/fastclick.js"></script>
<!-- NProgress -->
<script src="../js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../js/custom.min.js"></script>
       