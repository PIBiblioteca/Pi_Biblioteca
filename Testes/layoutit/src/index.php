<!DOCTYPE html>

<?php 

include("config.php");

$consulta = "SELECT * FROM livros";
$conn = $conexao->query($consulta) or die($conexao->error);
?> 

<html lang="pt-br">
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BiblioFateca - Livros</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	

  
  <body>
	
	<div class="row-1">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="nav-item active">
					<a class="nav-link" href="#">Livros</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Recados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Retiradas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Devoluções</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Suspensões</a>
				</li>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="#">Perfil</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Opções</a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="#">Sair</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div  class="row-2">
		<div  class="col-md-13">
			<table  class="table table-bordered table-hover table-sm">
				<thead>
					<tr class="cabecalho_table">
						<th>
							Categoria
						</th>
						<th>
							ID
						</th>
						<th>
							Título
						</th>
						<th>
							Autor
						</th>
						<th>
							Editora
						</th>
						<th>
							Quantidade
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
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
								
								
								<?php } } ?> 
				  
				</tbody>
			</table>
		</div>
	</div>
	<div class="row-3">
		<div>
			<p class="rodape">
			Fatec Franco da Rocha	Email:xxxxx@xxxxx.com				
			</p>
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>	
	
	<script>

	$(document).ready( function () {
		$('#id_tabela_livros').DataTable();
	} );

	</script>						
  </body>
</html>