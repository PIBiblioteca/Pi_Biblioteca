<!DOCTYPE html>
<?php 

include("/xampp/htdocs/GitHub/Pi_Biblioteca/BANCO_TESTE/config.php");

$consulta = "SELECT * FROM livros";
$conn = $conexao->query($consulta) or die($conexao->error);
?> 

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sua Página</title>

  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>
  
<table class="tabela" border="1" id="minhaTabela">
            <tr class="cabecalho">
                <td class="maior2">Curso</td>
                <td>Código Livro</td>
                <td>Titulo</td>
                <td>Autor</td>
                <td>Editora</td>
                <td>Quantidade</td>
            </tr>
            <?php 
            
            if ($conn->num_rows > 0){

                while ($dado = $conn->fetch_assoc()){    ?>          
            
                    <tr class="dados">
                     <td> <?php echo $dado['categoria']; ?> </td>
                     <td> <?php echo $dado['id']; ?> </td>
                     <td> <?php echo $dado['titulo']; ?> </td>
                     <td> <?php echo $dado['autor']; ?> </td>
                     <td> <?php echo $dado['editora']; ?> </td>
                     <td> <?php echo $dado['quantidade']; ?> </td>
                    
                    <td> <a href="index.php?codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Editar"> <i class="fas fa-pencil-alt"> </i></button></a></td>
                    
                     <td> <a href="index.php?p=deletar&codigo=<?php echo $dado['cod_livro']; ?>"> <button class="button-Excluir"> <i class="fas fa-times"> </i></button></a></td>
                     </tr>
                    <?php } } ?> 
      
        </table>

  
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
  
</body>
</html>