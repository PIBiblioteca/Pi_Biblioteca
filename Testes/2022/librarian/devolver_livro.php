<?php
include "connection.php";

//puxa identificação de qual livro está sendo devolvido
$id = $_GET["id"];

//puxa dados da tabela emprestimos
$res7 = mysqli_query($link, "SELECT * FROM emprestimos WHERE id='$id'");
while ($row7 = mysqli_fetch_array($res7)) {
    $enrollment = $row7["student_enrollment"];
    $books_name = $row7["books_name"];
    $books_issue_date = $row7["books_issue_date"];
    $return_date = $row7["books_return_date"];
    $contact = $row7["student_contact"];
    $email = $row7["student_email"];
}


$date = date('Y-m-d'); //data atual

//verifica se entrega está atrasada
if (strtotime($date) > strtotime($return_date)) {

    //Calculo diferença entre datas
    $data_inicial = implode('-', array_reverse(explode('/', "$return_date")));
    $data_final = implode('-', array_reverse(explode('/', "$date")));
    $diferenca = strtotime($data_final) - strtotime($data_inicial); // Calcula a diferença em segundos
    $dias = floor($diferenca / (60 * 60 * 24)); //Calcula a diferença em dias
    
    //calculo tempo de suspensão (1 a 7 dia de atraso = 1 semana de suspensão, 8 a 14 dias = 2 semanas...)
    $semanas_suspensão = ceil($dias / 7);
    
    $suspensionreturndate = date('Y-m-d', strtotime("$date+$semanas_suspensão weeks"));
    $suspensiondate = $date;
    $suspensioreason = "atraso de $dias dias";
    
    //atualiza dados de suspensão
    mysqli_query($link, "UPDATE suspensoes SET suspension_date='$suspensiondate', suspension_reasion='$suspensioreason', suspension_return_date='$suspensionreturndate' WHERE enrollment='$enrollment'");

    //Função remover livro de emprestados
    mysqli_query($link, "DELETE FROM emprestimos WHERE id='$id'");

    //função aumentar quantidade disponível
    mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$books_name'");
?>
    <script type="text/javascript">
        alert("Usuário suspenso até <?php echo (implode("/",array_reverse(explode("-",$suspensionreturndate))));?>)
        window.location="devolucoes.php";
    </script>
<?php
}
else {

//Função atualizar usuário suspenso para ativo
mysqli_query($link, "UPDATE cadastro_usuarios SET status_usuario='ATIVO' WHERE enrollment='$enrollment'");

//Função atualizar status do empréstimo
mysqli_query($link, "UPDATE emprestimos SET status_emprestimo='DEVOLVIDO' WHERE id='$id'");

//função aumentar quantidade disponível
mysqli_query($link, "UPDATE adicionar_livros SET available_qty=available_qty+1 WHERE books_name='$books_name'");
?>

<script type="text/javascript">
    alert("Livro devolvido!");
    window.location="devolucoes.php";
</script>
<?php
}
?>