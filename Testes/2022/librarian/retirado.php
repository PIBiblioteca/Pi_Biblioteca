<?php
include "connection.php";

//puxa identificação da solicitação
$id_solicitacao = $_GET["id_solicitacao"];

//puxa dados da tabela solicitações
$res7 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE id_solicitacao='$id_solicitacao'");
while ($row7 = mysqli_fetch_array($res7)) {
    $books_name = $row7["books_name"];
    $enrollment = $row7["student_enrollment"];
    $student_name = $row7["student_name"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
}
$issuedate=date("Y-m-d");
$returndate=date('Y-m-d', strtotime("+2 weeks"));

mysqli_query($link, "INSERT INTO emprestimos VALUES('','$enrollment','$student_name','$contact','$email','$books_name','$issuedate','$returndate','À DEVOLVER')");

mysqli_query($link, "DELETE FROM solicitacoes WHERE id_solicitacao='$id_solicitacao'");


?>
    <script type="text/javascript">
        alert("RETIRADA EFETUADA");
        window.location="retiradas.php";
    </script>