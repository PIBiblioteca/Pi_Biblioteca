<?php  
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher presente</title>
</head>
<body>
    
    <?php
        $id_livro=($_GET["id_livro"]);

        $id=$_GET["id_livro"];
        $res=mysqli_query($link, "SELECT * FROM livros WHERE id_livro=$id_livro");
       
        while($row = mysqli_fetch_array($res)) {
                                               
            echo "O presente escolhido foi ";
            echo $row["editora_livro"];
            echo " deseja confirmar?";
            echo "<br>";
        }
        ?>
            
            <button type="submit" name="submit1" style="padding: 5px 10px; color: white; background-color: green; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px"> teste </button>

           
                                    
            <input type="submit" value="Cancelar" name="submit1" style="padding: 5px 10px; color: white; background-color: brown; border: none; border-radius: 5px; box-shadow: none; margin: 0; margin: 5px;">
        <?php 
        
        
        //função do botão cancelar
        if(isset($_POST["submit1"]))
        {
            ?>
        <script type="text/javascript">
            window.location="lista_presentes.php";
        </script>
        
        <?php
        }
        //função do botão solicitar
        if(isset($_POST["submit2"]))
        {}
    ?>
    
</body>
</html>