<?php
include "connection.php";

//puxa identificação da solicitação
$id = $_GET["id"];

//puxa dados da tabela solicitações
$res7 = mysqli_query($link, "SELECT * FROM solicitacoes WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $books_name = $row7["books_name"];
    $enrollment = $row7["student_enrollment"];
    $student_name = $row7["student_name"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
}
$issuedate=date("d/m/Y");
$returndate=date('d/m/Y', strtotime("+2 weeks"));

mysqli_query($link, "INSERT INTO emprestimos VALUES('','$enrollment','$student_name','$contact','$email','$books_name','$issuedate','$returndate','RETIRADO')");

mysqli_query($link, "DELETE FROM solicitacoes WHERE id='$id'");


?>
    <script type="text/javascript">
        alert("RETIRADA EFETUADA"?>);
        window.location="retiradas.php";
    </script>