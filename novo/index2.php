<?php
session_start();
if (!isset($_SESSION["usuario"])) {
?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
<?php
}

include "../usuario/componentes_funcoes/connection.php";

?>

<!-- page content area main -->


<h2>Buscar Livros</h2>

<div class="x_content">

    <?php
    // código de exibir livros
    $i=0;
    $res=mysqli_query($link, "SELECT * FROM livros"); //função de exibir somente livros disponíveis: SELECT * FROM adicionar_livros WHERE quantidade_disponivel>0
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
        echo "<td align='center'>"; ?> <img style="width: 85px; height:120px" src="<?php echo $row["imagem_livro"]; ?>" height="100" width="100">  <?php 
        
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
    
    ?>


</div>
<!-- /page content -->