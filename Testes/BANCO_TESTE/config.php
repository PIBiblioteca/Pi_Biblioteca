<?php

<<<<<<< HEAD
$hostname = "localhost";
$user = "root";
$password = "";
$database = "bibliofateca";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if(!$conexao){
    print "Falha na conexão com o Banco de Dados";
}
=======
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "bibliofateca";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
>>>>>>> parent of 30f7e61 (Organização dos testes)

?>