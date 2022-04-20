<?php
session_start();

//função de segurança de login
if(!isset($_SESSION["email"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}

$email=$_SESSION["email"];
include "header.php";
include "connection.php";
mysqli_query($link, "UPDATE recados SET read1='y' WHERE email='$_SESSION[email]'");
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Recados</h3>
                        <br>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Mensagens da bibliotecária</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <table class="table table-bordered">
                                <tr>
                                    <th>Título</th>
                                    <th>Mensagem</th>
                                    <th>Data</th>
                                </tr>

                                <?php
                            $res=mysqli_query($link, "SELECT * FROM recados WHERE email='$_SESSION[email]' ORDER BY id DESC");
                            while($row=mysqli_fetch_array($res))
                            {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["title"]; echo "</td>"; 
                                    echo "<td>"; echo $row["msg"]; echo "</td>";
                                    echo "<td>"; echo $row["data_msg"]; echo "</td>";
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
include "../bibliotecaria/componentes_funcoes/footer.php";
?>

       