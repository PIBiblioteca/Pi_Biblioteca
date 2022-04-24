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
include "../usuario/componentes_funcoes/header.php";
include "../usuario/componentes_funcoes/connection.php"
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Regras Gerais da biblioteca</h2>
                                </div>

                            <div class="clearfix"></div>
                            
                            <div class="x_content">
                            
                                <table class="table table-bordered">
                                <tr>
                                    <th>Regulamento</th>
                                </tr>

                            <?php
                                $res=mysqli_query($link, "SELECT * FROM regras_biblioteca");
                                while($row=mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>"; echo $row["regras_gerais"]; echo "</td>"; 
                                echo "</tr>";
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