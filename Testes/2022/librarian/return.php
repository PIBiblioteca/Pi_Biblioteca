<?php
include "connection.php";

$enrollment="";
$return_date="";
$books_name="";

$res=mysqli_query($link, "SELECT * FROM issue_books WHERE student_enrollment=$enrollment");
while($row=mysqli_fetch_array($res))
{
    $books_name=$row["books_name"];   
    $return_date=$row["return_date"];

}
echo $books_name;
echo $return_date;

$enrollment=$_GET["enrollment"];
$true_return_date=date ('d/m/Y');
echo $true_return_date;

//CRIAR FUNÇÃO DEVOLUÇÃO ATRASADA

//Função puxar nome do livro para variável

if($true_return_date>$return_date){
    echo "TESTE";
}


//Função atualizar usuário suspenso para ativo
$res=mysqli_query($link, "UPDATE student_registration SET status='ATIVO' WHERE enrollment=$enrollment");

//Função remover livro de emprestados
mysqli_query($link, "DELETE FROM issue_books WHERE student_enrollment=$enrollment");



//função aumentar quantidade disponível
mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$books_name'"); 
?>

<script type="text/javascript">
    window.location="return_book.php";

</script>