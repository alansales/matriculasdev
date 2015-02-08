<?php
// Incluindo arquivo de conexão/configuração
require_once('config/conn.php');

// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Verificando se o usuário está logado, caso contrá será redirecionado para a página de login
if (!$objLogin->verificar('index.html'))
    // Finalizado o script, apenas para garantir que o usuário irá ver o conteúdo da página
    exit;

// Selecionando informações do usuário
$query = mysql_query("SELECT * FROM usuario WHERE usuario_id = {$objLogin->getID()}");
$usuario = mysql_fetch_object($query);

echo date("d/m/Y");
// definições de host, database, usuário e senha 
$host = "localhost"; 
$db = "metasmatricula"; 
$user = "root"; 
$pass = "losant71"; 
// conecta ao banco de dados 
$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar 
mysql_select_db($db, $con);
// Seleciona a tabela matriculas
$query = sprintf("SELECT SUM(quantidade) FROM matriculas"); 
// executa a query 
$dados = mysql_query($query, $con) or die(mysql_error()); 
// transforma os dados em um array 
$linha = mysql_fetch_assoc($dados); 
//var_dump($linha);die();
// calcula quantos dados retornaram 
$total = mysql_num_rows($dados);
//var_dump($total);die();
?>

<!DOCTYPE HTML>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Metas de Matrículas</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap localmente-->
		<script src="js/bootstrap.min.js"></script>
  </head>
  <body>
  <h1>Relatório de Matrículas</h1> 
        <ul>
            <!--<li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>-->
            <li><strong>Bem Vindo: </strong> <?php echo $objLogin->getLogin() ?></li>
        </ul>  
		<!--<p>Bem vindo <strong><?php echo $usuario->nome; ?></strong></p>-->
	
    <div class="navbar">
  <div class="navbar-inner">
    <!--<a class="brand" href="#">Título</a>-->
    <ul class="nav">
      <li class="active"><a href="cadastrar.php">Cadastro</a></li>
      <li><a href="relatorio.php">Relatórios</a></li>
      <li><a href="#">Administração</a></li>
	  <li><a href="sair.php">Sair</a></li>
    </ul>
  </div>
</div>
 <?php 
 // se o número de resultados for maior que zero, mostra os dados 
 if($total > 0) { 
 // inicia o loop que vai mostrar todos os dados 
 do { 
 ?> 
 <p>
 <?php echo $linha['quantidade']?> 
   </p> 
 <?php 
 // finaliza o loop que vai mostrar os dados 
 }while($linha = mysql_fetch_assoc($dados)); 
 // fim do if 
 } 
 ?>
  </body>
</html>