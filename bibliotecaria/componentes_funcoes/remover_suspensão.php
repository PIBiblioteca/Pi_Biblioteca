<?php
include "../librarian/componentes_funcoes/connection.php";

//puxa identificação de qual livro está sendo devolvido
$id = $_GET["id"];

//puxa dados da tabela emprestimos
$res7 = mysqli_query($link, "SELECT * FROM suspensoes WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $enrollment = $row7["student_enrollment"];
    $books_name = $row7["books_name"];
}

//Função atualizar usuário suspenso para ativo
$res = mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='ATIVO' WHERE enrollment=$enrollment");

//Função atualizar livro nos empréstimos
mysqli_query($link, "UPDATE emprestimos SET status_emprestimo='REPOSTO' WHERE id=$id");

//função aumentar quantidade disponível
mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$books_name'");
?>

<script type="text/javascript">
    alert("Livro reposto");
    window.location="suspensoes.php";
</script>