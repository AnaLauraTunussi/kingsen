<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "kingsen";

$conexao =mysqli_connect($servidor, $usuario, $senha, $banco) ;

if(mysqli_connect_errno()){
    die('falha na conexão' .mysqli_connect_error());
}

?>