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
  <h1>Administração</h1> 
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
      <li><a href="adm.php">Administração</a></li>
	  <li><a href="sair.php">Sair</a></li>
    </ul>
  </div>
</div>
<strong>...acesso restrito!</strong>

  </body>
</html>