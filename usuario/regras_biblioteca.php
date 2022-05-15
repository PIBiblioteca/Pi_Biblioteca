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
                                
                           <table  style='border: none;'>
                           
                           <?php
                           
                          
                           $index = 0;   
                                $res=mysqli_query($link, "SELECT * FROM regras_biblioteca");
                                while($row=mysqli_fetch_array($res)) {
                       
          
                                if($index%2==0){ 
                                    echo "<tr>";
                                    echo "<td style='background-color:#efecec; padding: 10px'>"; echo $row["id_regra"]; echo "</td>"; 
                                    echo "<td style='background-color:#efecec; padding: 10px'>"; echo $row["regra"]; echo "</td>"; 
                                    echo "</tr>";
                                    
                                 }
                                else {                                         
                                    echo "<tr>";
                                    echo "<td style='padding: 10px'>"; echo $row["id_regra"]; echo "</td>"; 
                                    echo "<td style='padding: 10px'>"; echo $row["regra"]; echo "</td>"; 
                                    echo "</tr>";
                                    
                                }
                                    
                                $index++;      
                                    

                                
                                
                            }
                            echo "</table>";  
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

