<?php
include "connection.php";

$enrollment = $_GET["enrollment"];
echo $enrollment;


$res5 = mysqli_query($link, "SELECT * FROM issue_books WHERE student_enrollment='$enrollment'");
while ($row5 = mysqli_fetch_array($res5)) {
    
    $contact = $row5["student_contact"];
    $email = $row5["student_email"];
    $booksname = $row5["books_name"];
}
    $suspensiondate = date("d/m/Y");
    $suspensioreason = "perda ou avaria";
    $suspensionreturndate = "até que seja feita a reposição do livro";


echo $contact;
echo $email;
echo $booksname;
echo $suspensiondate;
echo $suspensioreason;
echo $suspensionreturndate;


$res = mysqli_query($link, "INSERT INTO suspensions VALUES('', '$enrollment', '$contact', '$email', '$booksname', '$suspensiondate', '$suspensioreason', '$suspensionreturndate')");

?>

<script type="text/javascript">
    alert("usuário suspenso <?php echo $suspensionreturndate ?>");
    window.location = "return_book.php";
</script>