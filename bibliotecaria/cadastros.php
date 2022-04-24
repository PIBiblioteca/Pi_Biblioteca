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
include "..\bibliotecaria\componentes_funcoes\connection.php";
include "..\bibliotecaria\componentes_funcoes\contadores.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Cadastros</h3>
                    </div>

                    <?php include "..\bibliotecaria\componentes_funcoes\botao_pesquisar.php";?>
                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:750">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Aprovação e suspensão de cadastros</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php
                                echo "Usuários suspensos: $contador_suspensoes <br>";
                                echo "Livros da biblioteca: $contador_livros_disponiveis <br>";
                                echo "Livros emprestados: $contador_livros_emprestados <br>";
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
                                    echo "<td>"; ?> <a style="color: green" href="aprovar_cadastro.php?id_cadastro=<?php echo $row["id_cadastro"]; ?>">SIM</a> |
                                    <a style="color: brown" href="nao_aprovar_cadastro.php?id=<?php echo $row["id_cadastro"]; ?>">NÃO</a> <?php echo "</td>";
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
                                $res=mysqli_query($link,"SELECT * FROM cadastro_usuarios ORDER BY id_usuario DESC");
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
                                    echo "<td>"; ?> <a style="color: green" href="aprovar_cadastro.php?id_usuario=<?php echo $row["id_usuario"]; ?>">SIM</a> |
                                    <a style="color: brown" href="nao_aprovar_cadastro.php?id_usuario=<?php echo $row["id_usuario"]; ?>">NÃO</a> <?php echo "</td>";
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
include "../usuario/componentes_funcoes/footer.php";
?>

       