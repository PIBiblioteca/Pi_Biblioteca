<?php
include "connection.php";

//puxa identificação de qual livro está sendo devolvido
$id = $_GET["id"];

//puxa dados da tabela issue_books
$res7 = mysqli_query($link, "SELECT * FROM issue_books WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $enrollment = $row7["student_enrollment"];
    $books_name = $row7["books_name"];
    $books_issue_date = $row7["books_issue_date"];
    $return_date = $row7["books_return_date"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
}

//teste de variáveis
//echo $id;
//echo "<br> $enrollment";
//echo "<br> $books_name";
//echo "<br> $books_issue_date";
//echo "<br> devolu~çao $return_date";
//echo "<br> $contact";
//echo "<br> $email";

$date = date('d/m/Y'); //data atual

//verifica se entrega está atrasada
if ($date > $return_date) {
    //suspende usuário na tabela student_registration
    $status = 'SUSPENSO';
    mysqli_query($link, "UPDATE student_registration SET status='SUSPENSO' WHERE enrollment='$enrollment'");

    //Calculo diferença entre datas
    $data_inicial = implode('-', array_reverse(explode('/', "$return_date")));
    $data_final = implode('-', array_reverse(explode('/', "$date")));
    $diferenca = strtotime($data_final) - strtotime($data_inicial); // Calcula a diferença em segundos
    $dias = floor($diferenca / (60 * 60 * 24)); //Calcula a diferença em dias
    //echo "<br> A diferença é de $dias dias entre as datas <br>";

    //calculo tempo de suspensão (1 a 7 dia de atraso = 1 semana de suspensão, 8 a 14 dias = 2 semanas...)
    $semanas_suspensão = ceil($dias / 7);
    //echo "<br> $semanas_suspensão <br>"; 
    $suspensionreturndate = date('d/m/Y', strtotime("$date+$semanas_suspensão weeks"));
    //echo "<br> $date";
    //echo "<br> $suspensionreturndate";
    
    $suspensiondate = $date;
    $suspensioreason = "atraso de $dias dias";
    
    //echo "<br> $suspensiondate";
    //echo "<br> $suspensioreason";

    //atualiza dados de suspensão
    mysqli_query($link, "UPDATE suspensions SET suspension_date='$suspensiondate', suspension_reasion='$suspensioreason', suspension_return_date='$suspensionreturndate' WHERE enrollment='$enrollment'");

    //Função remover livro de emprestados
    mysqli_query($link, "DELETE FROM issue_books WHERE id=$id");

    //função aumentar quantidade disponível
    mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$books_name'");
?>
    <script type="text/javascript">
        alert("usuário suspenso até <?php echo $suspensionreturndate ?>");
        window.location="devolucoes.php";
    </script>
<?php
}
else {
//Função atualizar usuário suspenso para ativo
$res = mysqli_query($link, "UPDATE student_registration SET status='ATIVO' WHERE enrollment=$enrollment");

//Função remover livro de emprestados
mysqli_query($link, "DELETE FROM issue_books WHERE id=$id");

//função aumentar quantidade disponível
mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$books_name'");
?>

<script type="text/javascript">
    alert("Devolução concluída");
    window.location="devolucoes.php";
</script>
<?php
}
?>