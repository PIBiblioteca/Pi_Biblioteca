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
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Cadastros</h3>
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
                                <h2>Aprovação e suspensão de cadastros</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php
                                // RESULTADO COM PESQUISA   
                                if(isset($_POST["submit1"])) {
                                //Seleciona da tabela "cadastro_usuarios"                    
                                $res=mysqli_query($link, "SELECT * FROM cadastro_usuarios 
                                WHERE fullname LIKE('%$_POST[t1]%') 
                                OR enrollment LIKE('%$_POST[t1]%')
                                OR email LIKE('%$_POST[t1]%')
                                OR contact LIKE('%$_POST[t1]%')
                                OR status_usuario LIKE('%$_POST[t1]%')
                                ");
                                $contador=0; //contador para while
                                while($row = mysqli_fetch_array($res)) {
                                $contador=$contador+1;
                                if ($contador==1) {
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Nome usuário"; echo "</th>";
                                echo "<th>"; echo "E-mail"; echo "</th>";
                                echo "<th>"; echo "Contato"; echo "</th>";
                                echo "<th>"; echo "Matrícula"; echo "</th>";
                                echo "<th>"; echo "Status"; echo "</th>";
                                echo "<th>"; echo "Aprovar"; echo "</th>";
                                echo "</tr>";
                                $res=mysqli_query($link, "SELECT * FROM cadastro_usuarios 
                                WHERE fullname LIKE('%$_POST[t1]%') 
                                OR enrollment LIKE('%$_POST[t1]%')
                                OR email LIKE('%$_POST[t1]%')
                                OR contact LIKE('%$_POST[t1]%')
                                OR status_usuario LIKE('%$_POST[t1]%')
                                ");
                                while($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["fullname"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["contact"]; echo "</td>";
                                    echo "<td>"; echo $row["enrollment"]; echo "</td>";
                                    echo "<td>"; echo $row["status_usuario"]; echo "</td>";
                                    echo "<td>"; ?> <a style="color: green" href="aprovar_cadastro.php?id=<?php echo $row["id"]; ?>">SIM</a> |
                                    <a style="color: brown" href="nao_aprovar_cadastro.php?id=<?php echo $row["id"]; ?>">NÃO</a> <?php echo "</td>";
                                    echo "</tr>";
                                }
                                }
                                echo "</table>";
                                echo "</div>";
                            
                                }
                                if ($contador==0){
                                    echo "'$_POST[t1]' não encontrado";
                                }
                                }
                                else // RESULTADO SEM PESQUISA
                                { 
                                $res=mysqli_query($link,"SELECT * FROM cadastro_usuarios ORDER BY id DESC");
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Nome usuário"; echo "</th>";
                                echo "<th>"; echo "E-mail"; echo "</th>";
                                echo "<th>"; echo "Contato"; echo "</th>";
                                echo "<th>"; echo "Matrícula"; echo "</th>";
                                echo "<th>"; echo "Status"; echo "</th>";
                                echo "<th>"; echo "Aprovar"; echo "</th>";
                                echo "</tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["fullname"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["contact"]; echo "</td>";
                                    echo "<td>"; echo $row["enrollment"]; echo "</td>";
                                    echo "<td>"; echo $row["status_usuario"]; echo "</td>";
                                    echo "<td>"; ?> <a style="color: green" href="aprovar_cadastro.php?id=<?php echo $row["id"]; ?>">SIM</a> |
                                    <a style="color: brown" href="nao_aprovar_cadastro.php?id=<?php echo $row["id"]; ?>">NÃO</a> <?php echo "</td>";
                                    echo "</tr>";
                                }
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
include "footer.php";
?>

       