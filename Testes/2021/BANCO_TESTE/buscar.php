<?php
if (!isset($_GET['titulo'])) {
   header("Location: index.php");
   exit; 
}

$titulo = "%".trim($_GET['titulo'])."%";

$dbh = new PDO('mysql:host=127.0.0.1;dbname=bibliofateca', 'root', '');

$sth = $dbh->prepare('SELECT * FROM livros WHERE titulo LIKE :titulo');
$sth->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
echo"<pre>";

print_r($resultados);exit;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>