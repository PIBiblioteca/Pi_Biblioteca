<?php
include "connection.php";
$id=$_GET["id"];
$a=date ("d-M-Y");
$res=mysqli_query($link, "UPDATE emprestimos SET books_return_date='$a' WHERE id=$id");

$books_name="";
$res=mysqli_query($link, "SELECT * FROM emprestimos WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $books_name=$row["books_name"];
}

mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$books_name'"); //função aumentar quantidade disponível
?>
<!--
<script type="text/javascript">
    window.location="devolucoes.php";

</script>