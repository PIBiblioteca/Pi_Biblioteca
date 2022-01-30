<?php
include "connection.php";
$id=$_GET["id"];
$a=date ("d-M-Y");
$res=mysqli_query($link, "UPDATE issue_books SET books_return_date='$a' WHERE id=$id");
?>

<script type="text/javascript">
    window.location="return_book.php";

</script>