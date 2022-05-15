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
include "..\usuario\componentes_funcoes\connection.php";
include "..\usuario\componentes_funcoes\header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Regras de utilização da Biblioteca</h3>
                        <br>
                    </div>

                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Regras Gerais da biblioteca</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <?php
                            echo "<td>"; ?> <a href="../usuario/componentes_funcoes/adicionar_regra.php">Adicionar regra</a> <?php echo "</td>";
                                $res=mysqli_query($link, "SELECT * FROM regras_biblioteca");
                                while($row=mysqli_fetch_array($res)) {
                                

                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Id"; echo "</th>";
                                echo "<th>"; echo "Regra"; echo "</th>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>"; echo $row["id_regra"]; echo "</td>"; 
                                echo "<td>"; echo $row["regra"]; echo "</td>"; 
                                
                                
                                echo "<td>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Deletar</a> <?php echo "</td>";
                                
                                echo "<td>"; ?> <a href="editar_livro.php?id=<?php echo $row["id"]; ?>">Editar</a> <?php echo "</td>";
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


        <!-- footer content -->
    <?php
    include "../usuario/componentes_funcoes/footer.php";
    ?>   
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
</body>
</html>

