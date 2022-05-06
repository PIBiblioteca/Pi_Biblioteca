<?php
include "..\bibliotecario\componentes_funcoes\connection.php";

$result2 = mysqli_query($link, "SELECT * FROM livros");
if(mysqli_num_rows($result2) > 0) {   
    $contador_livros_disponiveis=0;
    while($row=mysqli_fetch_array($result2)) {
        $contador_livros_disponiveis=$contador_livros_disponiveis + $row["quantidade_livro"]; 
    }

}

$result2 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo ='À DEVOLVER'");
    $contador_livros_emprestados=0;
    while($row=mysqli_fetch_array($result2)) {
        $contador_livros_emprestados = $contador_livros_emprestados + 1;
    }

$result2 = mysqli_query($link, "SELECT * FROM emprestimos WHERE status_emprestimo ='DEVOLVIDO'");
    $contador_livros_devolvidos=0;
    while($row=mysqli_fetch_array($result2)) {
        $contador_livros_devolvidos = $contador_livros_devolvidos + 1;
    }

$result2 = mysqli_query($link, "SELECT * FROM suspensoes");
    $contador_suspensoes=0;
    while($row=mysqli_fetch_array($result2)) {
        $contador_suspensoes = $contador_suspensoes + 1;
    }    
?>