<?php
include "connection.php";

//puxa identificação da solicitação
$id = $_GET["id"];

//puxa dados da tabela retiradas
$res7 = mysqli_query($link, "SELECT * FROM retiradas WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $books_name = $row7["books_name"];
    $enrollment = $row7["student_enrollment"];
    $student_name = $row7["student_name"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
}
$issuedate=date("d/m/Y");
$returndate=date('d/m/Y', strtotime("+2 weeks"));

mysqli_query($link, "INSERT INTO issue_books VALUES('','$enrollment','$student_name',' ','$contact','$email','$books_name','$issuedate','$returndate','')");



?>
    <script type="text/javascript">
        alert("LIVRO EMPRESTADO, DEVOLUÇÃO EM <?php $returndate?>");
        window.location="retiradas.php";
    </script>