
<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "bibliofateca";
//Aqui é feita a conexão:
$conexao = mysqli_connect($hostname, $user, $password, $database); //mudar o nome "conexao" futuramente por segurança contra raquer

if($conexao){
    echo "Conexão com o Banco de Dados bem sucedida";
}else{
    print "Falha na conexão com o Banco de Dados";
}

?>