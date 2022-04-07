<?php
include "connection.php";

//puxa id do empréstimo
$id = $_GET["id"];

//puxa dados tabela livros emprestados
$res5 = mysqli_query($link, "SELECT * FROM emprestimos WHERE id='$id'");
while ($row5 = mysqli_fetch_array($res5)) {
    $enrollment = $row5["student_enrollment"];
    $contact = $row5["student_contact"];
    $email = $row5["student_email"];
    $booksname = $row5["books_name"];
}
    
    $suspensiondate = date("Y-m-d");
    $suspensioreason = "perda/avaria";
    $suspensionreturndate = "até que seja feita a reposição do livro";

//verifica se já está suspenso e atualiza informações
$res6 = mysqli_query($link, "SELECT * FROM suspensoes WHERE student_enrollment='$enrollment'");
if(mysqli_num_rows($res6) > 0) {
    mysqli_query($link, "UPDATE suspensoes SET suspension_date='$suspensiondate', suspension_reason='$suspensioreason', suspension_return_date='$suspensionreturndate' WHERE student_enrollment='$enrollment'");
} else {
    //suspende usuário
    mysqli_query($link, "INSERT INTO suspensoes VALUES('', '$enrollment', '$contact', '$email', '$booksname', '$suspensiondate', '$suspensioreason', '$suspensionreturndate')");
}

mysqli_query($link, "UPDATE emprestimos SET status_emprestimo='PERDA/AVARIA' WHERE id='$id'");

mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='SUSPENSO' WHERE enrollment='$enrollment'"); 

?>

<script type="text/javascript">
    alert("Usuário suspenso <?php echo $suspensionreturndate ?>");
    window.location = "devolucoes.php";
</script>