<?php
include "connection.php";

$id = $_GET["id"];
echo $id;


$res5 = mysqli_query($link, "SELECT * FROM issue_books WHERE id='$id'");
while ($row5 = mysqli_fetch_array($res5)) {
    $enrollment = $row5["student_enrollment"];
    $contact = $row5["student_contact"];
    $email = $row5["student_email"];
    $booksname = $row5["books_name"];
}
    
    $suspensiondate = date("d/m/Y");
    $suspensioreason = "perda ou avaria";
    $suspensionreturndate = "até que seja feita a reposição do livro";

echo $enrollment;
echo $contact;
echo $email;
echo $booksname;
echo $suspensiondate;
echo $suspensioreason;
echo $suspensionreturndate;


mysqli_query($link, "INSERT INTO suspensions VALUES('', '$enrollment', '$contact', '$email', '$booksname', '$suspensiondate', '$suspensioreason', '$suspensionreturndate')");

mysqli_query($link, "UPDATE student_registration SET status='SUSPENSO' WHERE enrollment='$enrollment'"); 

?>
<!--
<script type="text/javascript">
    alert("usuário suspenso <?php echo $suspensionreturndate ?>");
    window.location = "devolucoes.php";
</script>