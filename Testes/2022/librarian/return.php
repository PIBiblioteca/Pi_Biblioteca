<?php
include "connection.php";

$enrollment=$_GET["enrollment"];
echo $enrollment;
$a=date ("d-M-Y");
$res=mysqli_query($link, "UPDATE issue_books SET books_return_date='$a' WHERE student_enrollment=$enrollment");

$books_name="";
$res=mysqli_query($link, "SELECT * FROM issue_books WHERE student_enrollment=$enrollment");
while($row=mysqli_fetch_array($res))
{
    $books_name=$row["books_name"];
}

mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$books_name'"); //função aumentar quantidade disponível
?>

<script type="text/javascript">
    window.location="return_book.php";

</script>