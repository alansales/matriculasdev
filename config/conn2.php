<?php 
$host = "localhost";
$usuario = "root";
$senha = "losant71";
$banco = "metasmatricula";

$conn = mysql_connect($host, $usuario, $senha) or die ("Servidor não responde");
$db = mysql_select_db($banco, $conn) or die ("Não foi possível realizar a conexão com o Banco de Dados");
?>
