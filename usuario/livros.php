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
include "../usuario/componentes_funcoes/connection.php";

?>

        <!-- page content area main -->
        <link rel="stylesheet" href="..usuario/css/header.css"> 
        
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Livros</h3>
                    </div>
                    
                    <!-- menu pesquisa -->
                    <form name="form1" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">

                                        <input type="text" name="t1" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-btn">
                                                <button type="submit" name="submit1" id="search books" class="btn btn-default"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </span>
                                    
                                </div>
                            </div>

                            <select name="select" style="width: 150px; height: 32px; float: right; padding-left: 20px; color: #9e9fa0; background-color: white; border: none; border-radius: 5px; box-shadow: inset 0 1px 0 rgb(0 0 0 / 8%); margin: 0; margin: 5px; margin-top: 11px;">
                            <option value="valor1" selected>Categorias</option>
                            <option value="valor2">G3E</option>
                            <option value="valor3">GTI</option>
                            <option value="valor4">Cultura Geral</option>
                            </select>

                            
                        </div>
                        
                    </form>
                    <!-- / menu pesquisa -->

                    

                            
                            
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Buscar Livros</h2>
                                

                                <div class="clearfix"></div>

                          
                            </div>
                            
                            <div class="x_content">
                           
                            <?php
                            //FUNÇÃO PESQUISAR
                            if(isset($_POST["submit1"])) // pega variável de entrada do usuário
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM livros WHERE titulo_livro like('%$_POST[t1]%')"); //função pesquisa: WHERE books_name like('%$_POST[t1]%')
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row = mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
                                    echo "<td>"; ?> <img src="../<?php echo $row["imagem_livro"];  ?>" height="100" width="100">  <?php 
                                    echo "<br>";
                                    echo "<b>".$row["titulo_livro"]."</b>";
                                    echo "<br>";
                                    echo "<b>". "Disponíveis: ".$row["quantidade_livro"]."</b>";
                                    
                                    $qtdzero=$row["quantidade_livro"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                    echo "<br>";
                                    echo "<b>"; ?>
                                    <button > </button> <a href="../usuario/solicitar_emprestimo.php?id_livro=<?php echo $row["id_livro"]; ?>">SOLICITAR EMPRÉSTIMO</a> <?php echo "</b>";
                                    }      
                                    echo "</td>";
                                    
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }

                                }
                                echo "</tr>";
                                echo "</table>";
                                echo "</div>";

                            }
                            else // código de exibir livros
                            {
                                $i=0;
                                $res=mysqli_query($link, "SELECT * FROM livros"); //função de exibir somente livros disponíveis: SELECT * FROM adicionar_livros WHERE available_qty>0
                                echo "<div id='container'>";
                                echo "<table class='table table-bordered' >";
                                echo "<tr>";
                                while($row = mysqli_fetch_array($res))
                                {
                                    $i=$i+1;
                                    if($row["imagem_livro"]==''){
                                        echo "<td align='center'>";
                                        echo "";?><img style="width: 85px; height:120px" src="../images/CAPA NÃO cARREGADA.jpg" alt=""><?php
                                        echo "<br>";
                                    }
                                    else {
                                    echo "<td>"; ?> <img style="width: 85px; height:120px" src="../<?php echo $row["imagem_livro"]; ?>" height="100" width="100">  <?php 
                                    
                                    echo "<br>";
                                    }                                                                        
                                    $qtdzero=$row["quantidade_livro"];
                                    if($qtdzero==0){
                                        echo "<br>";
                                        echo "LIVRO INDISPONÍVEL";
                                    }              
                                    else {
                                    echo "<b>"; ?> <button style="background-color: #428bca; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin-top: 8px; margin-bottom: 5px"  > <a style="color: white" href="../usuario/solicitar_emprestimo.php?id_livro=<?php echo $row["id_livro"]; ?>">Solicitar <br> empréstimo</a> </button> <?php echo "</b>";
                                    }      
                                echo "<br>";    
                                echo "<b style='color: #428bca'>".$row["titulo_livro"]."</b>";
                                echo "<br>";
                                echo "Disponíveis: ".$row["quantidade_livro"];
                                    echo "</td>";
                                    
                                    if($i==5)
                                    {
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }

                                }
                                echo "</tr>";
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

       