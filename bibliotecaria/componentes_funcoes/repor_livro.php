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
include "connection.php";

//puxa identificação de qual livro está sendo reposto
$id = $_GET["id"];

//puxa dados da tabela emprestimos
$res7 = mysqli_query($link, "SELECT * FROM emprestimos WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $enrollment = $row7["student_enrollment"];
    $books_name = $row7["books_name"];
}

if(isset($_GET["id"]))
    {
        //Função atualizar usuário suspenso para ativo
    mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='ATIVO' WHERE enrollment='$enrollment'");

    //Função atualizar status do empréstimo
    mysqli_query($link, "UPDATE emprestimos SET status_emprestimo='DEVOLVIDO' WHERE student_enrollment='$enrollment'");

    //função aumentar quantidade disponível
    mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$books_name'");

    mysqli_query($link, "DELETE FROM suspensoes WHERE student_enrollment='$enrollment'");
    } 
    ?>
<script type="text/javascript">
    alert("Livro reposto!");
    window.location="../devolucoes.php";

</script>