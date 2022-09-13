<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de presentes</title>
</head>
<body>
    <?php
    $res=mysqli_query($link, "SELECT * FROM livros");
    echo "<div id='container'>";
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th style='text-align: left;'>"; echo "Item"; echo "</th>";
    echo "<th style='text-align: left;'>"; echo "Quantidade"; echo "</th>";
    echo "<th>"; echo ""; echo "</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($res)) {
                                           
        echo "<tr>";                                        

        echo "<td>"; echo $row["editora_livro"]; echo "</td>";
        echo "<td>"; echo $row["edicao_livro"]; echo "</td>";

        echo "<td>"; ?> <a href="escolher_presente.php?id_livro=<?php echo $row["id_livro"]; ?>">Escolher presente</a> <?php echo "</td>";
        echo "</tr>";
        
    }
    echo "</table>";
    echo "</div>";

    if(isset($_POST["submit2"])){
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    }
    // 1 coberto 2 lençois 2 fronhas 2 travesseiros 2 toalhas de rosto 
    
    ?>
</body>
</html>