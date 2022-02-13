<?php
include "connection.php";

//puxa identificação da solicitação
$id = $_GET["id"];

//puxa dados da tabela retiradas
$res7 = mysqli_query($link, "SELECT * FROM retiradas WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $enrollment = $row7["student_enrollment"];
    $books_name = $row7["books_name"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
    $status = $row7["status_solicitacao"];
}
$issuedate=date("d/m/Y");
$returndate=date('d/m/Y', strtotime("+2 weeks"));


